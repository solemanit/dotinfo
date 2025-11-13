<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Otp extends Model
{
    protected $fillable = [
        'mobile', 'otp', 'expires_at', 'last_sent_at', 'is_verified'
    ];

    // ✅ Cooldown Time (seconds)
    protected static $cooldown = 60;

    // ✅ Generate OTP
    public static function generateOtp()
    {
        return rand(1000, 9999);
    }

    // ✅ Check if OTP can be sent again
    public static function canSendOtp($mobile)
    {
        $otp = self::where('mobile', $mobile)->latest()->first();

        if (!$otp) return true;

        return Carbon::parse($otp->last_sent_at)->diffInSeconds(now()) >= self::$cooldown;
    }

    // ✅ Remaining Countdown Time
    public static function getRemainingSeconds($mobile)
    {
        $otp = self::where('mobile', $mobile)->latest()->first();

        if (!$otp) return 0;

        $elapsed = Carbon::parse($otp->last_sent_at)->diffInSeconds(now());

        return max(0, self::$cooldown - $elapsed);
    }

    // ✅ Check Expiration
    public function isExpired()
    {
        return Carbon::parse($this->expires_at)->isPast();
    }
}
