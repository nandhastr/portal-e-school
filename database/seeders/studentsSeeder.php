<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\students;

class studentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        students::create([
            'user_id' => 1,
            'class_id' => 1,
            'batch' => '2022',
            'internship_status' => 'Active',
        ]);
    }
}
