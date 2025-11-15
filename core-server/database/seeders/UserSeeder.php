<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Active normal user
        User::create([
            'name'           => 'Regular User',
            'email'          => 'user@dotinfo.app',
            'login_email'    => 'user@dotinfo.app',
            'password'       => Hash::make('password'),
            'role'           => 'user',
            'is_active'      => true,
            'country_code'   => 'BD',
            'country_name'   => 'Bangladesh',
            'registration_ip'=> '127.0.0.1',
        ]);
    }
}
