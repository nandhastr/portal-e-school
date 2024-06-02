<?php

namespace Database\Seeders;

use App\Models\announcements;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class announcementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        announcements::create([
            'title' => 'Upcoming Exam Schedule',
            'content' => 'The midterm exam schedule has been updated. Please check the website for details.',
        ]);
    }
}
