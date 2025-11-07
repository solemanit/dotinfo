<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'role',
        'is_active',
        'country_code',
        'country_name',
        'registration_ip',
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

    // Check if user is admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Check if user is regular user
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    // Check if user is active
    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function redirectToDashboard()
    {
        return $this->isAdmin() ? route('admin.dashboard') : route('user.dashboard');
    }

    public function card()
    {
        return $this->hasOne(Card::class);
    }

    // ✅ Check if user is from Bangladesh
    public function isBangladeshi(): bool
    {
        return $this->country_code === 'BD';
    }

    // ✅ Check if user is foreign (non-BD)
    public function isForeign(): bool
    {
        return $this->country_code !== 'BD';
    }

    // ✅ Check if foreign user needs email verification
    public function requiresEmailVerification(): bool
    {
        return $this->isForeign() && !$this->hasVerifiedEmail();
    }
}
