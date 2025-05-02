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
        Schema::create('feedback_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feedback_template_id');
            $table->unsignedBigInteger('competency_category_id')->nullable();
            $table->string('question');
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->foreign('feedback_template_id')->references('id')->on('feedback_templates')->onDelete('cascade');
            $table->foreign('competency_category_id')->references('id')->on('competency_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_questions');
    }
};
