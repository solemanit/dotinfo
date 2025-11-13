<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends BaseVerifyEmail
{
    /**
     * Build the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        // Laravel-এর verification URL generate
        $url = $this->verificationUrl($notifiable);

        return (new MailMessage)
                    ->subject('Verify Your Email Address')
                    ->view('emails.verify-email', [
                        'user' => $notifiable,
                        'url' => $url,
                    ]);
    }
}
