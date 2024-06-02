<?php

namespace Database\Seeders;

use App\Models\exams;
use App\Models\tasks;
use App\Models\grades;
use App\Models\students;
use App\Models\materials;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class gradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Tambahkan data nilai ke tabel grades
        grades::create([
            'type' => 'UTS',
            'student_id' => 1,
            'material_id' => 1,
            'exam_id' => 1,
            'task_id' => 1,
            'grade' => 85.5,
        ]);
    }
}
