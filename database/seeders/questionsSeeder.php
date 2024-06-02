<?php

namespace Database\Seeders;

use App\Models\questions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class questionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        questions::create([
            'question' => 'What is the capital of France?',
        ]);
    }
}
