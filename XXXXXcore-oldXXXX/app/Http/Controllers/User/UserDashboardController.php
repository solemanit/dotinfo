<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    // Dashboard view
    public function index()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }

    // Show profile
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // Delete account
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'account-deleted');
    }
}
