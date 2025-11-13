<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use App\Models\Otp;
use App\Services\SmsService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Foundation\Exceptions\Renderer\Exception;

class RegisteredUserController extends Controller
{
    protected SmsService $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function create()
    {
        if (!session()->has('qr_card_id')) {
            return redirect()->route('home')->with('error', 'Register by scanning the QR code.');
        }

        return view('auth.register');
    }

    public function store(Request $request): JsonResponse
    {
        if (!session()->has('qr_card_id')) {
            return response()->json(['success' => false, 'message' => 'Invalid request! QR Scan required.'], 403);
        }

        // ✅ Turnstile Verification
        if (!app()->environment('local')) { // শুধুমাত্র production/staging এ চালানো হবে
            $token = $request->input('cf-turnstile-response');
            if (!$token) {
                return response()->json(['success' => false, 'message' => 'Captcha validation required.'], 422);
            }

            $client = new Client();
            $response = $client->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'form_params' => [
                    'secret' => config('services.turnstile.secret_key'),
                    'response' => $token,
                    'remoteip' => $request->ip(),
                ],
            ]);

            $verification = json_decode((string) $response->getBody(), true);
            if (empty($verification['success']) || !$verification['success']) {
                return response()->json(['success' => false, 'message' => 'Captcha verification failed.'], 422);
            }
        }

        // From Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'regex:/^01[3-9][0-9]{8}$/', 'unique:users,mobile'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $mobile = $request->mobile;

        if (!Otp::canSendOtp($mobile)) {
            $remaining = Otp::getRemainingSeconds($mobile);
            return response()->json(['success' => false, 'message' => "Please wait {$remaining} seconds.", 'remaining_seconds' => $remaining], 429);
        }

        $otpCode = Otp::generateOtp();

        // Save OTP
        Otp::create([
            'mobile' => $mobile,
            'otp' => $otpCode,
            'expires_at' => Carbon::now()->addMinutes(5),
            'last_sent_at' => Carbon::now(),
            'is_verified' => false,
        ]);

        session([
            'registration_data' => [
                'name' => $request->name,
                'mobile' => $mobile,
                'email' => $request->email,
                'password' => $request->password,
            ],
            'otp_mobile' => $mobile,
        ]);

        $smsResponse = $this->smsService->sendOtp($mobile, $otpCode);

        if ($smsResponse['success']) {
            return response()->json(['success' => true, 'message' => 'OTP sent successfully.']);
        }

        return response()->json(['success' => false, 'message' => $smsResponse['message']], 500);
    }

    public function verifyOtp(Request $request): JsonResponse
    {
        $request->validate(['otp' => ['required', 'string', 'size:4']]);

        $mobile = session('otp_mobile');
        $registrationData = session('registration_data');

        if (!$mobile || !$registrationData) {
            return response()->json(['success' => false, 'message' => 'Session expired. Please register again.'], 400);
        }

        $otp = Otp::where('mobile', $mobile)
            ->where('otp', $request->otp)
            ->where('is_verified', false)
            ->latest()
            ->first();

        if (!$otp) {
            return response()->json(['success' => false, 'message' => 'Invalid OTP.'], 400);
        }

        if ($otp->isExpired()) {
            return response()->json(['success' => false, 'message' => 'OTP expired.'], 400);
        }

        $otp->update(['is_verified' => true]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $registrationData['name'],
                'mobile' => $registrationData['mobile'],
                'email' => $registrationData['email'],
                'password' => Hash::make($registrationData['password']),
                'role' => 'user',
                'is_active' => true,
                // ✅ Country info যোগ করুন
                'country_code' => session('user_country_code'),
                'country_name' => session('user_country_name'),
                'registration_ip' => session('user_ip'),
            ]);

            // ✅ BD User → Direct Email Verified
            $user->forceFill([
                'email_verified_at' => now(),
            ])->save();

            if (session()->has('qr_card_id')) {
                $card = Card::where('card_id', session('qr_card_id'))->first();
                if ($card) {
                    $card->update(['user_id' => $user->id, 'status' => 'active']);
                }
            }

            DB::commit();
            session()->forget(['registration_data', 'otp_mobile', 'qr_card_id']);

            event(new Registered($user));
            Auth::login($user);

            return response()->json(['success' => true, 'redirect' => route('user.dashboard')]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Registration failed.'], 500);
        }
    }

    public function resendOtp(Request $request): JsonResponse
    {
        $mobile = session('otp_mobile');

        if (!$mobile) {
            return response()->json(['success' => false, 'message' => 'Session expired. Please register again!'], 400);
        }

        if (!Otp::canSendOtp($mobile)) {
            $remaining = Otp::getRemainingSeconds($mobile);
            return response()->json([
                'success' => false,
                'message' => "Please wait {$remaining} seconds.",
                'remaining_seconds' => $remaining
            ], 429);
        }

        $otpCode = Otp::generateOtp();

        $otp = Otp::create([
            'mobile' => $mobile,
            'otp' => $otpCode,
            'expires_at' => Carbon::now()->addMinutes(5),
            'last_sent_at' => Carbon::now(),
            'is_verified' => false,
        ]);

        $smsResponse = $this->smsService->sendOtp($mobile, $otpCode);

        if ($smsResponse['success']) {
            return response()->json([
                'success' => true,
                'message' => 'New OTP sent successfully.',
                'remaining_seconds' => 60
            ]); // ✅ নতুন কাউন্টডাউন পাঠানো হচ্ছে
        }

        return response()->json(['success' => false, 'message' => $smsResponse['message']], 500);
    }
}
