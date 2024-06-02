<?php

namespace Database\Seeders;

use App\Models\user_activities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class user_activitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user_activities::create([
            'student_id' => 1,
            'activity' => 'Participated in Math Olympiad',
            'activity_date' => '2024-05-25',
            'description' => 'Received a silver medal.',
        ]);
    }
}
