<?php

namespace Database\Seeders;

use App\Models\awards;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class awardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        awards::create([
            'student_id' => 1,
            'title' => 'Best in Mathematics',
            'description' => 'Awarded for outstanding performance in Mathematics.',
            'date_received' => '2024-06-01',
        ]);
    }
}
