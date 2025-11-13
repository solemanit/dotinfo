<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['card_id', 'qrcode', 'status', 'user_id', 'activated_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($card) {

            do {
                $card_id = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            } while (self::where('card_id', $card_id)->exists());

            $card->card_id = $card_id;
        });
    }

    protected $casts = [
        'activated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Check if card is active
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    // Check if card is pending
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    // Check if card is inactive
    public function isInactive(): bool
    {
        return $this->status === 'inactive';
    }

    public function digitalCard()
    {
        return $this->hasOne(DigitalCard::class);
    }

}
