<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowerUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'commercial_name',
        'cost',
        'module',
        'description',
        'icon',
        'color',
        'is_active'
    ];
}