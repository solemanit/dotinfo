<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredForeignUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        // যদি qr_card_id সেশন না থাকে → রেজিস্ট্রেশন হতে দিবে না
        if (!session()->has('qr_card_id')) {
            return redirect()->route('home')->with('error', 'Register by scanning the QR code.');
        }

        return view('auth.register-foreign');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // আবার চেক করে নিলাম, সরাসরি POST করে বাইপাস না করতে পারে
        if (!session()->has('qr_card_id')) {
            return redirect()->route('home')->with('error', 'Register by scanning the QR code.');
        }

        // ✅ Turnstile Captcha Verification
        if (!app()->environment('local')) {
            $token = $request->input('cf-turnstile-response');
            if (!$token) {
                return redirect()->back()->with('error', 'Captcha verification required.');
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
                return redirect()->back()->with('error', 'Captcha verification failed. Please try again.');
            }
        }

        // Form Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'login_email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'is_active' => true,
            'country_code' => session('user_country_code'),
            'country_name' => session('user_country_name'),
            'registration_ip' => session('user_ip'),
        ]);

        // ✅ Store card with PENDING status (will be activated after email verification)
        if (session()->has('qr_card_id')) {
            $card = Card::where('card_id', session('qr_card_id'))->first();
            if ($card) {
                $card->update([
                    'user_id' => $user->id,
                    'status' => 'pending' // ✅ Email verify না হওয়া পর্যন্ত pending
                ]);
            }
            session()->forget('qr_card_id');
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('verification.notice')->with('success', 'Please verify your email to activate your card.');
    }
}
