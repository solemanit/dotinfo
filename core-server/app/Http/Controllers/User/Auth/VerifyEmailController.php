<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        // ✅ Already verified check
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(
                $user->redirectToDashboard() . '?verified=1'
            )->with('info', 'Email already verified.');
        }

        // ✅ Mark email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));

            // ✅ Ensure user is active
            if (!$user->is_active) {
                $user->update(['is_active' => true]);
            }

            // ✅ Activate card if exists and is pending
            if ($user->card && $user->card->status === 'pending') {
                $user->card->update([
                    'status' => 'active',
                    'activated_at' => now(),
                ]);
            }
        }

        return redirect()->intended(
            $user->redirectToDashboard() . '?verified=1'
        )->with('success', 'Email verified successfully! Your card is now active.');
    }
}
