<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skill_boosters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained(); // Admin yang beli
            $table->foreignId('user_id')->constrained(); // Karyawan yang dapat booster
            $table->foreignId('power_up_id')->constrained(); // Relasi ke power_up
            $table->text('ai_suggestion'); // Saran AI
            $table->integer('credits_used'); // Coin yang dipakai
            $table->boolean('is_used')->default(false); // Status pakai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_boosters');
    }
};
