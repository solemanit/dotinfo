<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use GuzzleHttp\Client;

class UserAuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(UserLoginRequest $request): RedirectResponse
    {
        if (!app()->environment('local')) {
            $token = $request->input('cf-turnstile-response');

            if (!$token) {
                return back()->withErrors(['captcha' => 'Captcha verification required.'])->withInput();
            }

            try {
                $client = new Client();
                $response = $client->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'form_params' => [
                        'secret'   => config('services.turnstile.secret_key'),
                        'response' => $token,
                        'remoteip' => $request->ip(),
                    ],
                ]);

                $verification = json_decode((string) $response->getBody(), true);

                if (empty($verification['success'])) {
                    return back()->withErrors(['captcha' => 'Captcha verification failed.'])->withInput();
                }
            } catch (\Exception $e) {
                return back()->withErrors(['captcha' => 'Captcha service unavailable.'])->withInput();
            }
        }

        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::guard('web')->user();

        if (!$user->isActive()) {
            Auth::guard('web')->logout();
            return back()->withErrors(['login' => 'Your account has been deactivated.'])->withInput();
        }

        if (!$user->isUser()) {
            Auth::guard('web')->logout();
            return back()->withErrors(['login' => 'Access denied. Please use admin login.'])->withInput();
        }

        session([
            'user_login_time' => now(),
            'user_id'         => $user->id,
            'user_name'       => $user->name,
            'user_role'       => $user->role,
        ]);

        if ($user->isForeign() && !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice')
                ->with('warning', 'Please verify your email to access your dashboard.');
        }

        return redirect()->intended(route('user.dashboard'))
            ->with('success', 'Welcome back, ' . $user->name . '!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'You have been logged out successfully.');
    }
}
