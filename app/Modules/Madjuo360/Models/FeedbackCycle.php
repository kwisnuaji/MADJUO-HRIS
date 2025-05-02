<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;

class FeedbackCycle extends Model
{
    protected $table = 'feedback_cycles';

    protected $fillable = [
        'company_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'is_active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function assignments()
    {
        return $this->hasMany(FeedbackAssignment::class, 'feedback_cycle_id');
    }
}
