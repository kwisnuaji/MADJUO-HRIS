<?php

namespace App\Http\Controllers;

use App\Models\MadjuoCoin;
use App\Models\PowerUp;
use Illuminate\Http\Request;

class PowerUpController extends Controller
{
    // Tampilkan semua fitur premium
    public function index()
    {
        return PowerUp::where('is_active', true)->get();
    }

    // Proses pembelian
    public function purchase(Request $request, $powerUpId)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'target_id' => 'required|exists:users,id' // Karyawan/tim yang dituju
        ]);

        $powerUp = PowerUp::findOrFail($powerUpId);
        $companyCoins = MadjuoCoin::where('company_id', $request->company_id)->first();

        // Cek saldo
        if (!$companyCoins || $companyCoins->balance < $powerUp->cost) {
            return response()->json(['message' => 'Madjuo Coins tidak cukup!'], 400);
        }

        // Kurangi saldo
        $companyCoins->balance -= $powerUp->cost;
        $companyCoins->save();

        // Proses fitur (simulasi)
        $result = $this->activatePowerUp($powerUp, $request->target_id);

        return response()->json([
            'message' => "Fitur {$powerUp->commercial_name} berhasil diaktifkan!",
            'result' => $result
        ]);
    }

    // Contoh logika aktivasi fitur
    private function activatePowerUp($powerUp, $targetId)
    {
        // Misal: Skill Booster generate saran AI
        if ($powerUp->commercial_name === 'Skill Booster') {
            return "Saran pengembangan untuk User #{$targetId}: ...";
        }

        return "Fitur {$powerUp->name} dijalankan untuk target #{$targetId}";
    }
}