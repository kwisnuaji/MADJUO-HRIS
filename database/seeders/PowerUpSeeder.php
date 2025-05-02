<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PowerUp;

class PowerUpSeeder extends Seeder
{
    public function run()
    {
        $powerUps = [
            [
                'name' => 'Saran Pengembangan Individu',
                'commercial_name' => 'Skill Booster',
                'cost' => 100,
                'module' => '360,KPI',
                'description' => 'Memberikan rekomendasi pengembangan personal berbasis hasil evaluasi',
                'icon' => 'skill_booster.svg',
                'color' => 'blue',
                'is_active' => true
            ],
            [
                'name' => 'Saran Pengembangan Tim',
                'commercial_name' => 'Team Gems',
                'cost' => 150,
                'module' => '360',
                'description' => 'Rekomendasi pengembangan dinamis tim berdasarkan data kolektif',
                'icon' => 'team_gems.svg',
                'color' => 'purple',
                'is_active' => true
            ]
        ];

        foreach ($powerUps as $powerUp) {
            PowerUp::create($powerUp);
        }
    }
}