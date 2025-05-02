<?php

namespace App\Http\Controllers;

use App\Models\MadjuoCoin;
use App\Models\PowerUp;
use App\Models\SkillBooster;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

class SkillBoosterController extends Controller
{
    // Tampilkan form beli
    public function create($userId)
    {
        $powerUp = PowerUp::where('commercial_name', 'Skill Booster')->first();
        return view('skill-boosters.create', compact('userId', 'powerUp'));
    }

    // Proses pembelian
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Cek power up "Skill Booster"
        $powerUp = PowerUp::where('commercial_name', 'Skill Booster')->firstOrFail();

        // Cek saldo coin perusahaan
        $companyCoins = MadjuoCoin::where('company_id', $request->company_id)->firstOrFail();
        
        if ($companyCoins->balance < $powerUp->cost) {
            return back()->with('error', 'Madjuo Coins tidak cukup!');
        }

        // Kurangi saldo
        $companyCoins->balance -= $powerUp->cost;
        $companyCoins->save();

        // Generate saran AI (simulasi)
        $aiSuggestion = $this->generateAISuggestion($request->user_id);

        // Simpan ke database
        SkillBooster::create([
            'company_id' => $request->company_id,
            'user_id' => $request->user_id,
            'power_up_id' => $powerUp->id,
            'ai_suggestion' => $aiSuggestion,
            'credits_used' => $powerUp->cost,
        ]);

        return redirect()->route('users.show', $request->user_id)
            ->with('success', 'Skill Booster berhasil dibeli!');
    }

    // Fungsi generate saran AI (mock)
    private function generateAISuggestion($userId)
    {
        $user = User::find($userId);
        $skills = ['Leadership', 'Komunikasi', 'Manajemen Waktu'];
        $randomSkill = $skills[array_rand($skills)];
        return "{$user->name} perlu meningkatkan skill {$randomSkill} berdasarkan hasil review 360° terakhir.";
    }
}