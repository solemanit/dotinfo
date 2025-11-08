<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DigitalCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'user_id',
        'name',
        'title',
        'photo',
        'website',
        'phone',
        'email',
        'whatsapp',
        'address',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'youtube',
        'tiktok',
        'pinterest',
        'snapchat',
        'github',
    ];

    // Relationship: DigitalCard belongs to Card
    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    // Relationship: DigitalCard belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
