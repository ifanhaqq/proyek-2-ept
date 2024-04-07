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
            //reading
            [
                'wave_id' => 1,
                'section' => 'reading',
                'reading_id' => 1,
                'question' => 'Sit?',
                'question_ch1' => 'Lorem',
                'question_ch2' => 'ipsum',
                'question_ch3' => 'dolor',
                'question_ch4' => 'amet',
                'correct_answer' => 'dolor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wave_id' => 1,
                'section' => 'reading',
                'reading_id' => 1,
                'question' => 'Ipsum?',
                'question_ch1' => 'Lorem',
                'question_ch2' => 'dolor',
                'question_ch3' => 'sit',
                'question_ch4' => 'amet',
                'correct_answer' => 'lorem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wave_id' => 1,
                'section' => 'reading',
                'reading_id' => 1,
                'question' => 'amet?',
                'question_ch1' => 'lorem',
                'question_ch2' => 'ipsum',
                'question_ch3' => 'sit',
                'question_ch4' => 'dolor',
                'correct_answer' => 'ipsum',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // listening
            [
                'wave_id' => 1,
                'section' => 'listening',
                'reading_id' => null,
                'question' => 'sample-3s.mp3',
                'question_ch1' => 'ipsum',
                'question_ch2' => 'dolor',
                'question_ch3' => 'sit',
                'question_ch4' => 'amet',
                'correct_answer' => 'ipsum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wave_id' => 1,
                'section' => 'listening',
                'reading_id' => null,
                'question' => 'sample-file-4.mp3',
                'question_ch1' => 'Lorem',
                'question_ch2' => 'sit',
                'question_ch3' => 'amet',
                'question_ch4' => 'ipsum',
                'correct_answer' => 'sit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wave_id' => 1,
                'section' => 'listening',
                'reading_id' => null,
                'question' => 'file_example_MP3_700KB.mp3',
                'question_ch1' => 'Lorem',
                'question_ch2' => 'ipsum',
                'question_ch3' => 'dolor',
                'question_ch4' => 'amet',
                'correct_answer' => 'dolor',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Grammar
            [
                'wave_id' => 1,
                'section' => 'grammar',
                'reading_id' => null,
                'question' => 'Lorem',
                'question_ch1' => 'ipsum',
                'question_ch2' => 'dolor',
                'question_ch3' => 'sit',
                'question_ch4' => 'amet',
                'correct_answer' => 'ipsum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wave_id' => 1,
                'section' => 'grammar',
                'reading_id' => null,
                'question' => 'ipsum',
                'question_ch1' => 'Lorem',
                'question_ch2' => 'sit',
                'question_ch3' => 'amet',
                'question_ch4' => 'ipsum',
                'correct_answer' => 'sit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wave_id' => 1,
                'section' => 'grammar',
                'reading_id' => null,
                'question' => 'dolor',
                'question_ch1' => 'Lorem',
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
