<?php

namespace App\Modules\Madjuo360\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;

class EmployeeProfile extends Model
{
    protected $table = 'employee_profiles';

    protected $fillable = [
        'user_id',
        'company_id',
        'position',
        'department',
        'profile_picture',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
