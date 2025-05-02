<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackQuestion extends Model
{
    protected $table = 'feedback_questions';

    protected $fillable = [
        'template_id',
        'category_id',
        'question_text',
        'question_type',
        'options',
    ];

    protected $casts = [
        'options' => 'array', // Jika ada pilihan multiple choice
    ];

    public function template()
    {
        return $this->belongsTo(FeedbackTemplate::class, 'template_id');
    }

    public function category()
    {
        return $this->belongsTo(CompetencyCategory::class, 'category_id');
    }
}
