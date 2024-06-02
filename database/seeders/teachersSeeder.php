<?php

namespace Database\Seeders;

use App\Models\teachers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class teachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        teachers::create([
            'user_id' => 1,
            'specialization' => 'Mathematics',
        ]);
    }
}
