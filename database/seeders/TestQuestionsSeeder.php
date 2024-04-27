<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TestQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('test_questions')->insert([
            [
                'wave_id' => 2,
                'section' => 'listening',
                'reading_id' => null,
                'question' => 'Listening.mp3',
                'question_ch1' => 'There are many different airline fares available.',
                'question_ch2' => 'ipsum',
                'question_ch3' => 'dolor',
                'question_ch4' => 'amet',
                'correct_answer' => 'ipsum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
