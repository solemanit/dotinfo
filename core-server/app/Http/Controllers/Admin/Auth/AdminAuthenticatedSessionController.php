<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use GuzzleHttp\Client;

class AdminAuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('admin.login');
    }

    public function store(AdminLoginRequest $request): RedirectResponse
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

        $admin = Auth::guard('admin')->user();

        if (!$admin->isActive()) {
            Auth::guard('admin')->logout();
            return back()->withErrors(['email' => 'Your account has been deactivated.'])->withInput();
        }

        session([
            'admin_login_time' => now(),
            'admin_id'         => $admin->id,
            'admin_name'       => $admin->name,
            'admin_role'       => $admin->role,
        ]);

        return redirect()->intended(route('admin.dashboard'))
            ->with('success', 'Welcome back, ' . $admin->name . '!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Logged out successfully.');
    }
}
