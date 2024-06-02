<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            UserSeeder::class,
            studentsSeeder::class,
            teachersSeeder::class,
            materialsSeeder::class,
            tasksSeeder::class,
            examSeeder::class,
            questionsSeeder::class,
            exam_questionsSeeder::class,
            optionsSeeder::class,
            user_answerSeeder::class,
            user_activitiesSeeder::class,
            awardSeeder::class,
            competitionSeeder::class,
            eventSeeder::class,
            user_logSeeder::class,
            announcementSeeder::class,
            gradeSeeder::class
        ]);
    }
}
