<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PowerUpSeeder::class,
            
            // Seeder lainnya...
        ]);
        $this->call(\App\Modules\Madjuo360\Database\Seeders\StarterPlanAndModuleSeeder::class);
        $this->call(\App\Modules\Madjuo360\Database\Seeders\AssignStarterPlanToCompaniesSeeder::class);
    }
}
