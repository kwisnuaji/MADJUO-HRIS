<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Madjuo',
            'email' => 'admin@madjuo.com',
            'password' => Hash::make('password123'),
            'company_id' => 1, // Sesuaikan dengan ID company yang ada
            'is_active' => true
        ]);

        // User dummy lainnya
        // User::factory(5)->create();
    }
}