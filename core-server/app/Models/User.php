<?php

namespace App\Models;

use App\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'login_mobile',
        'login_email',
        'email',
        'mobile',
        'password',
        'role',
        'is_active',
        'country_code',
        'country_name',
        'registration_ip',
        'photo',
        'designation',
        'company',
        'website',
        'whatsapp',
        'address',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'youtube',
        'tiktok',
        'pinterest',
        'telegram',
        'snapchat',
        'github',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // Role Checks
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    // Country Helpers
    public function isBangladeshi(): bool
    {
        return $this->country_code === 'BD';
    }

    public function isForeign(): bool
    {
        return $this->country_code !== 'BD';
    }

    public function requiresEmailVerification(): bool
    {
        return $this->isForeign() && !$this->hasVerifiedEmail();
    }

    // Relationships
    public function card()
    {
        return $this->hasOne(Card::class);
    }

    // Accessors
    public function getPhotoUrlAttribute()
    {
        return $this->photo
            ? asset('storage/' . $this->photo)
            : 'https://via.placeholder.com/300';
    }

    // Social & Contact Checks
    public function hasSocialLinks(): bool
    {
        return collect([
            $this->facebook, $this->instagram, $this->linkedin,
            $this->twitter, $this->youtube, $this->tiktok,
            $this->pinterest, $this->telegram, $this->snapchat,
            $this->github,
        ])->filter()->isNotEmpty();
    }

    public function hasContactInfo(): bool
    {
        return collect([
            $this->website, $this->mobile, $this->email,
            $this->whatsapp, $this->address,
        ])->filter()->isNotEmpty();
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopeRegularUsers($query)
    {
        return $query->where('role', 'user');
    }

    // Notifications
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }
}
