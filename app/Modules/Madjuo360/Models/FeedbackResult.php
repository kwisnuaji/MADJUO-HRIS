<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackResult extends Model
{
    protected $table = 'feedback_results';

    protected $fillable = [
        'feedback_assignment_id',
        'feedback_question_id',
        'score',
        'comment',
    ];

    public function assignment()
    {
        return $this->belongsTo(FeedbackAssignment::class, 'feedback_assignment_id');
    }

    public function question()
    {
        return $this->belongsTo(FeedbackQuestion::class, 'feedback_question_id');
    }
}
