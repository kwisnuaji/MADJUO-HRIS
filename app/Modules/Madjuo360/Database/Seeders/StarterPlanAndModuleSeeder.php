<?php

namespace App\Modules\Madjuo360\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Madjuo360\Models\Plan;
use App\Modules\Madjuo360\Models\Module;

class StarterPlanAndModuleSeeder extends Seeder
{
    public function run(): void
    {
        // Insert Plan Starter
        $starterPlan = Plan::firstOrCreate(
            ['slug' => 'starter-plan'],
            [
                'name' => 'Starter Plan',
                'slug' => 'starter-plan',
                'description' => 'Plan Gratis Selamanya untuk 1 siklus feedback',
                'price' => 0,
                'billing_cycle' => 'per_cycle',
                'is_active' => true,
            ]
        );

        // Insert Modul Madjuo-360
        $madjuo360Module = Module::firstOrCreate(
            ['slug' => 'madjuo-360'],
            [
                'name' => 'Madjuo-360',
                'description' => 'Modul 360 Feedback untuk penilaian karyawan secara menyeluruh.',
            ]
        );

        // Hubungkan modul ke plan starter jika belum
        if (!$starterPlan->modules()->where('module_id', $madjuo360Module->id)->exists()) {
            $starterPlan->modules()->attach($madjuo360Module->id);
        }
    }
}
