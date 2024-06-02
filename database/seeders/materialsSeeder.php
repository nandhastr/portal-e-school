<?php

namespace Database\Seeders;

use App\Models\materials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class materialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        materials::create([
            'title' => 'Introduction to Algebra',
            'content' => 'This is an introductory material to algebra.',
            'subject' => 'Mathematics',
        ]);
    }
}
