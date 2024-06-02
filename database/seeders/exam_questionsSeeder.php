<?php

namespace Database\Seeders;

use App\Models\exam_questions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class exam_questionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        exam_questions::create([
            'exam_id' => 1,
            'question_id' => 1,
        ]);
    }
}
