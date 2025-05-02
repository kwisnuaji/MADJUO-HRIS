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
        Schema::create('power_ups', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "Skill Booster"
            $table->string('commercial_name'); // Contoh: "AI Insight"
            $table->integer('cost'); // Harga dalam Madjuo Coins (100)
            $table->string('module'); // Modul terkait (360/KPI)
            $table->text('description'); // Deskripsi singkat
            $table->string('icon'); // Nama file ikon (skill_booster.svg)
            $table->string('color'); // Warna dominan (biru, ungu, dll)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('power_ups');
    }
};
