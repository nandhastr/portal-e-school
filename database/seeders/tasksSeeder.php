<?php

namespace Database\Seeders;

use App\Models\tasks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tasks::create([
            'student_id' => 1,
            'title' => 'Math Homework',
            'description' => 'Complete exercises 1-5 on page 50.',
            'file_path' => 'path/to/homework.pdf',
            'deadline' => '2024-06-10',
            'status' => 'Pending',
        ]);
    }
}
