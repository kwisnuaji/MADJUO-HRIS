<?php

namespace App\Modules\Madjuo360\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Modules\Madjuo360\Models\Plan;
use App\Modules\Madjuo360\Models\Subscription;

class AssignStarterPlanToCompaniesSeeder extends Seeder
{
    public function run()
    {
        // Ambil plan starter
        $starterPlan = Plan::where('slug', 'starter')->first();

        if (!$starterPlan) {
            echo "Starter Plan tidak ditemukan. Seeder dibatalkan.\n";
            return;
        }

        // Pastikan relasi subscriptions dikenali
        $companies = Company::whereDoesntHave('subscriptions')->get();

        foreach ($companies as $company) {
            Subscription::create([
                'company_id' => $company->id,
                'plan_id' => $starterPlan->id,
                'started_at' => now(),
                'expires_at' => now()->addDays($starterPlan->duration_days ?? 30),
                'is_active' => true,
            ]);

            echo "Starter Plan berhasil di-assign ke perusahaan: {$company->name}\n";
        }
    }
}
