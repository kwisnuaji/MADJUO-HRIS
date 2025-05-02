<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Modules\Madjuo360\Models\Subscription;
use App\Modules\Madjuo360\Models\Module;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'billing_cycle',
        'max_cycles',
        'max_users',
        'is_active',
    ];

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'plan_module', 'plan_id', 'module_id')
                    ->withTimestamps();
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'plan_id');
    }
}
