<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResendOrUpdateEmailController extends Controller
{
    /**
     * Handle both updating email and resending verification.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $newEmail = trim($request->input('email'));

        if ($newEmail !== $user->email) {
            // Update email and reset verification
            $user->forceFill([
                'email' => $newEmail,
                'email_verified_at' => null,
            ])->save();

            $user->sendEmailVerificationNotification();

            return back()->with('success', 'Your email has been updated and a new verification link has been sent.');
        }

        // Just resend verification email
        $user->sendEmailVerificationNotification();

        return back()->with('info', 'Verification email resent to your current address.');
    }
}
