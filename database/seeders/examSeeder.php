<?php

namespace Database\Seeders;

use App\Models\exams;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class examSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        exams::create([
            'title' => 'Midterm Exam',
            'subject' => 'Mathematics',
            'duration' => 90, // Duration in minutes
            'start_time' => '2024-06-15 09:00:00',
            'end_time' => '2024-06-15 10:30:00',
        ]);
    }
}
