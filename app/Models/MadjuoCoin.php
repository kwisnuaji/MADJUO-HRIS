<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MadjuoCoin extends Model
{
    use HasFactory;

    protected $table = 'madjuo_coins'; // Nama tabel
    protected $fillable = ['user_id', 'balance']; // Kolom yang bisa diisi

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}