<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth('web')->check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        if (!auth('web')->user()->isActive()) {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Your account is inactive.');
        }

        if (!auth('web')->user()->isAdmin()) {
            return redirect()->route('user.dashboard')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
