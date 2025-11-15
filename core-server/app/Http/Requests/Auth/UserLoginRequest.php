<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $loginInput = $this->input('login');
        $isBdUser = session('is_bd_user', false);

        if ($isBdUser) {
            if (preg_match('/^\d{11}$/', $loginInput)) {
                $loginField = 'login_mobile';
            } elseif (str_contains($loginInput, '@')) {
                $loginField = 'login_email';
            } else {
                throw ValidationException::withMessages([
                    'login' => 'Please enter a valid 11-digit mobile number or email.',
                ]);
            }
        } else {
            if (!str_contains($loginInput, '@')) {
                throw ValidationException::withMessages([
                    'login' => 'Only email login is allowed from your region.',
                ]);
            }
            $loginField = 'login_email';
        }

        $credentials = [
            $loginField => $loginInput,
            'password'  => $this->input('password'),
        ];

        if (!Auth::guard('web')->attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'login' => trans('auth.failed')
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('login')) . '|' . $this->ip()
        );
    }
}
