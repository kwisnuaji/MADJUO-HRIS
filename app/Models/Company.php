<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Modules\Madjuo360\Models\Subscription;

class Company extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'companies';

    // Kolom yang boleh di-mass assign
    protected $fillable = [
        'name',
        'slug',
        'industry',
        'address',
        'phone',
        'website',
        'logo',
        'plan',
        'plan_activated_at',
        'is_active',
    ];

    /**
     * Relasi ke users (satu company punya banyak user)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relasi ke modul 360 feedback (Madjuo360) jika diperlukan
     */
    public function feedbackTemplates()
    {
        return $this->hasMany(\App\Modules\Madjuo360\Models\FeedbackTemplate::class, 'company_id');
    }

    /**
     * Relasi ke subscription (billing)
     */
    public function subscriptions()
    {
        return $this->hasMany(\App\Modules\Madjuo360\Models\Subscription::class);
    }

    /**
     * Relasi ke competency categories (Madjuo360)
     */
    public function competencyCategories()
    {
        return $this->hasMany(\App\Modules\Madjuo360\Models\CompetencyCategory::class, 'company_id');
    }


}
