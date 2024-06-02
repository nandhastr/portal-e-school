<?php

namespace Database\Seeders;

use App\Models\events;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        events::create([
            'student_id' => 1,
            'title' => 'School Science Fair',
            'description' => 'Participated in the school science fair.',
            'event_date' => '2024-05-20',
            'location' => 'School Auditorium',
        ]);
    }
}
