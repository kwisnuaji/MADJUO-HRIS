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
        Schema::create('competency_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // untuk multi-tenant
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            // Relasi ke companies
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_categories');
    }
};
