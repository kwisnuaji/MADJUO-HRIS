<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class CompetencyCategory extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'description',
    ];

    // Relasi ke company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi ke feedback questions
    public function feedbackQuestions()
    {
        return $this->hasMany(FeedbackQuestion::class, 'competency_category_id');
    }
}
