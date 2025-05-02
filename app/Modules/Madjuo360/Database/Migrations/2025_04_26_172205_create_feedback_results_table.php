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
        Schema::create('feedback_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feedback_cycle_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('feedback_question_id');
            $table->integer('score')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('feedback_cycle_id')->references('id')->on('feedback_cycles')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('feedback_question_id')->references('id')->on('feedback_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_results');
    }
};
