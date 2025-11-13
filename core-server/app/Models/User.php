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

    // Role checks
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

    public function redirectToDashboard()
    {
        return $this->isAdmin() ? route('admin.dashboard') : route('user.dashboard');
    }

    // Relationship with Card
    public function card()
    {
        return $this->hasOne(Card::class);
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
        return collect([
            $this->facebook,
            $this->instagram,
            $this->linkedin,
            $this->twitter,
            $this->youtube,
            $this->tiktok,
            $this->pinterest,
            $this->telegram,
            $this->snapchat,
            $this->github,
        ])->filter()->isNotEmpty();
    }

    // ✅ Check if digital card has contact info
    public function hasContactInfo(): bool
    {
        return collect([
            $this->website,
            $this->mobile,
            $this->email,
            $this->whatsapp,
            $this->address,
        ])->filter()->isNotEmpty();
    }

    // Country helpers
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

     /**
     * Scope for active users
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for admin users
     */
    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    /**
     * Scope for regular users
     */
    public function scopeRegularUsers($query)
    {
        return $query->where('role', 'user');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }
}
