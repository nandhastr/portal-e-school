<?php

namespace Database\Seeders;

use App\Models\competitions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class competitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        competitions::create([
            'student_id' => 1,
            'title' => 'Mathematics Quiz Bowl',
            'description' => 'Competed in the regional Mathematics Quiz Bowl competition.',
            'date_participated' => '2024-05-30',
            'result' => 'Second Place',
        ]);
    }
}
