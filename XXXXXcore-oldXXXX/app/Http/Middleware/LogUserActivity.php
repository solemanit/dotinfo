<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogUserActivity
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            Log::info('User Activity', [
                'user_id' => auth()->id(),
                'name' => auth()->user()->name,
                'role' => auth()->user()->role,
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'time' => now()
            ]);
        }

        return $next($request);
    }
}
