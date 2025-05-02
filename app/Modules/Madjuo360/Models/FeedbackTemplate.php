<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Modules\Madjuo360\Models\FeedbackQuestion;

class FeedbackTemplate extends Model
{
    protected $table = 'feedback_templates';

    protected $fillable = [
        'company_id',
        'name',
        'description',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function questions()
    {
        return $this->hasMany(FeedbackQuestion::class, 'template_id');
    }
}
