<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;

class FeedbackAssignment extends Model
{
    protected $table = 'feedback_assignments';

    protected $fillable = [
        'feedback_cycle_id',
        'rater_id',
        'ratee_id',
        'status', // misal: pending, completed
    ];

    public function feedbackCycle()
    {
        return $this->belongsTo(FeedbackCycle::class, 'feedback_cycle_id');
    }

    public function rater()
    {
        return $this->belongsTo(User::class, 'rater_id');
    }

    public function ratee()
    {
        return $this->belongsTo(User::class, 'ratee_id');
    }

    public function results()
    {
        return $this->hasMany(FeedbackResult::class, 'feedback_assignment_id');
    }
}
