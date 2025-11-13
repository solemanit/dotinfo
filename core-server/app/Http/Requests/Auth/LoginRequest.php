<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'login' => ['required', 'string'], // email or mobile
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $loginInput = $this->input('login');
        $isBdUser = session('is_bd_user', false); // session থেকে লোকেশন ধরা

        // ✅ Determine login field based on country
        if ($isBdUser) {
            // বাংলাদেশ → email or 11-digit mobile allowed
            if (preg_match('/^\d{11}$/', $loginInput)) {
                $loginField = 'login_mobile';
            } elseif (str_contains($loginInput, '@')) {
                $loginField = 'login_email';
            } else {
                throw ValidationException::withMessages([
                    'login' => 'Please enter a valid 11-digit mobile number or email address.',
                ]);
            }
        } else {
            // বাংলাদেশ ছাড়া → শুধুমাত্র email
            if (!str_contains($loginInput, '@')) {
                throw ValidationException::withMessages([
                    'login' => 'Only email login is allowed from your region.',
                ]);
            }
            $loginField = 'login_email';
        }

        $credentials = [
            $loginField => $loginInput,
            'password' => $this->input('password'),
        ];

        if (! Auth::attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages(['login' => trans('auth.failed')]);
        }

        RateLimiter::clear($this->throttleKey());
    }


    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
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

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('login')) . '|' . $this->ip());
    }
}
