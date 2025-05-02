<?php

namespace Database\Seeders;

use App\Models\MadjuoCoin;
use App\Models\User;
use Illuminate\Database\Seeder;

class MadjuoCoinSeeder extends Seeder
{
    public function run()
    {
        // Cek dulu, kalau gak ada user, bikin 1 dummy
        $user = User::first();
        
        if (!$user) {
            $user = User::create([
                'name' => 'User Demo',
                'email' => 'demo@madjuo.com',
                'password' => bcrypt('password'),
                'company_id' => 1, // Pastikan company_id 1 ada di tabel `companies`
            ]);
        }

        // Kasih 100 Madjuo Coins ke user itu
        MadjuoCoin::create([
            'user_id' => $user->id,
            'balance' => 20,
        ]);
    }
}