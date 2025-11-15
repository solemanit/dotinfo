<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Please login as admin.');
        }

        $admin = Auth::guard('admin')->user();

        if (method_exists($admin, 'isActive') && !$admin->isActive()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')
                ->with('error', 'Your account has been deactivated.');
        }

        if (method_exists($admin, 'isAdmin') && !$admin->isAdmin()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')
                ->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
