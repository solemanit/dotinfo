<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class AuthHelper
{
    /**
     * Get current logged-in user
     */
    public static function currentUser()
    {
        return Auth::user();
    }

    /**
     * Check if user is logged in
     */
    public static function isLoggedIn(): bool
    {
        return Auth::check();
    }

    /**
     * Check if logged-in user is admin
     */
    public static function isAdmin(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * Check if logged-in user is regular user
     */
    public static function isUser(): bool
    {
        return Auth::check() && Auth::user()->isUser();
    }

    /**
     * Get user role
     */
    public static function userRole(): ?string
    {
        return Auth::check() ? Auth::user()->role : null;
    }

    /**
     * Check if user is active
     */
    public static function isActive(): bool
    {
        return Auth::check() && Auth::user()->isActive();
    }

    /**
     * Get user login time (from session)
     */
    public static function loginTime()
    {
        return session('login_time');
    }
}
