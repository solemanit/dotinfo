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

    // ✅ DigitalCard belongs to Card
    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    // ✅ DigitalCard belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ✅ Get full photo URL
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        return 'https://via.placeholder.com/300';
    }

    // ✅ Check if digital card has social links
    public function hasSocialLinks(): bool
    {
        return !empty($this->facebook) || !empty($this->instagram) ||
               !empty($this->linkedin) || !empty($this->twitter) ||
               !empty($this->youtube) || !empty($this->tiktok) ||
               !empty($this->pinterest) || !empty($this->snapchat) ||
               !empty($this->github);
    }

    // ✅ Check if digital card has contact info
    public function hasContactInfo(): bool
    {
        return !empty($this->website) || !empty($this->phone) ||
               !empty($this->email) || !empty($this->whatsapp) ||
               !empty($this->address);
    }
}
