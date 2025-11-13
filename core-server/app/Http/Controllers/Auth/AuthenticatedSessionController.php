<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use GuzzleHttp\Client;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if (!app()->environment('local')) { // শুধুমাত্র production/staging এ চালানো হবে
            // ✅ Turnstile CAPTCHA Verification
            $token = $request->input('cf-turnstile-response');
            if (!$token) {
                return back()->withErrors(['captcha' => 'Captcha verification required.']);
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
                return back()->withErrors(['captcha' => 'Captcha verification failed. Please try again.']);
            }
        }

        // ✅ Authentication
        $request->authenticate();
        $request->session()->regenerate();

        $user = auth()->user();

        // Check if user is active
        if (!$user->isActive()) {
            auth()->logout();
            return back()->withErrors(['email' => 'Your account has been deactivated.']);
        }

        // Store session info
        session([
            'login_time' => now(),
            'user_role' => $user->role,
            'user_name' => $user->name,
        ]);


        // ✅ Foreign user & email not verified → redirect to verification notice
        if ($user->isUser() && $user->country_code !== 'BD' && !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice')
                ->with('warning', 'Please verify your email address to access your dashboard.');
        }

        // Redirect based on role
        return $user->isAdmin()
            ? redirect()->intended(route('admin.dashboard'))->with('success', 'Welcome back, Admin!')
            : redirect()->intended(route('user.dashboard'))->with('success', 'Welcome back!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been successfully logged out.');
    }
}
