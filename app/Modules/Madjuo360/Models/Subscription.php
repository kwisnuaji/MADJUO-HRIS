<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    protected $fillable = [
        'company_id',
        'plan_id',
        'start_date',
        'end_date',
        'is_active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
