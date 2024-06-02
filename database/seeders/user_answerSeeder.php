<?php

namespace Database\Seeders;

use App\Models\user_answers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class user_answerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user_answers::create([
            'student_id' => 1,
            'question_id' => 1,
            'option_id' => 1,
        ]);
    }
}
