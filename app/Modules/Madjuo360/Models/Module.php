<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_module', 'module_id', 'plan_id')
                    ->withTimestamps();
    }
}
