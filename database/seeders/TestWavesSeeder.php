<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TestWavesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('test_waves')->insert(
            [
            'title' => 'First Wave',
            'token' => 'DMYNT',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    );
    }
}
