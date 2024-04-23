<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
            DB::table('test_results')->insert(
                [
                    'wave_id' => '1',
                    'question_id' => '1',
                    'section' => 'listening',
                    'user_id' => '3',
                    'answer' => 'DMYNT',
                    'status' => 'correct',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

    }
}
