<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

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

                Log::info('Card activated after email verification', [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'card_id' => $user->card->card_id,
                    'activated_at' => now(),
                ]);
            }

            Log::info('Email verified successfully', [
                'user_id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'time' => now(),
            ]);
        }

        return redirect()->intended(
            $user->redirectToDashboard() . '?verified=1'
        )->with('success', 'Email verified successfully! Your card is now active.');
    }
}
