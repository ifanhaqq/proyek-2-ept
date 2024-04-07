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
        Schema::create('test_question', function (Blueprint $table) {
            $table->id('question_id');
            $table->bigInteger('wave_id');
            $table->enum('section', ['reading', 'listening', 'grammar']);
            $table->longText('reading_id')->nullable();
            $table->longText('question');
            $table->longText('question_ch1');
            $table->longText('question_ch2');
            $table->longText('question_ch3');
            $table->longText('question_ch4');
            $table->longText('correct_answer');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_question');
    }
};
