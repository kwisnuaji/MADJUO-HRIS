<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Madjuo360\Models\Subscription;
use Carbon\Carbon;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        // Ambil perusahaan yang baru saja dibuat
        $company = \App\Models\Company::first(); // Sesuaikan dengan cara pengambilan perusahaan yang sesuai

        // Pastikan perusahaan ada
        if ($company) {
            // Buat subscription untuk perusahaan
            Subscription::create([
                'company_id' => $company->id,
                'plan'       => 'Starter Plan', // Ganti sesuai dengan plan yang dimiliki perusahaan
                'started_at' => Carbon::now(),
                'ends_at'    => Carbon::now()->addMonth(1), // Sesuaikan dengan durasi subscription
                'status'     => 'active',
            ]);
        }
    }
}
