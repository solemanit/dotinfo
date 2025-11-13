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
            'email' => 'admin@example.com',
            'mobile' => '01617960000',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
            'country_code' => 'BD',
            'country_name' => 'Bangladesh'
        ]);

        // Create Regular Users
        User::create([
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'mobile' => '01710000002',
            'password' => Hash::make('password'),
            'role' => 'user',
            'is_active' => true,
        ]);
    }
}
