<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillBooster extends Model
{
    protected $fillable = [
        'company_id',
        'user_id',
        'power_up_id',
        'ai_suggestion',
        'credits_used',
        'is_used'
    ];

    // Relasi ke perusahaan
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi ke user/karyawan
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke power_up (misal: "Skill Booster")
    public function powerUp()
    {
        return $this->belongsTo(PowerUp::class);
    }
}