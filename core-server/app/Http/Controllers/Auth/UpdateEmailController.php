<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateEmailController extends Controller
{
    /**
     * Update the user's email address and send verification.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Validate new email
        $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $oldEmail = $user->email;
        $newEmail = $request->email;

        // Check if email is actually different
        if ($oldEmail === $newEmail) {
            return back()->with('info', 'This is already your current email address.');
        }

        // ✅ Update email and reset verification
        $user->update([
            'email' => $newEmail,
            'email_verified_at' => null, // Reset verification
        ]);

        // ✅ Send new verification email
        $user->sendEmailVerificationNotification();

        return back()->with('email-updated', 'Email address updated successfully! Please check your new email for verification link.');
    }
}
