<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerifiedForForeignUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // যদি user না থাকে তাহলে pass করে দিবে
        if (!$user) {
            return $next($request);
        }

        // বাংলাদেশী user দের জন্য email verification optional
        if ($user->country_code === 'BD') {
            return $next($request);
        }

        // Foreign user এবং email verify না হলে verification page এ redirect
        if (!$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice')
                ->with('warning', 'Please verify your email address to continue.');
        }

        return $next($request);
    }
}
