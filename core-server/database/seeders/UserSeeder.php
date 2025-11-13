<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'login_email' => 'admin@example.com',
            'login_mobile' => '01617960000',
            'mobile' => '01617960000',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
            'email_verified_at' => now(),
            'country_code' => 'BD',
            'country_name' => 'Bangladesh',
            'registration_ip' => '127.0.0.1',
        ]);
    }
}
