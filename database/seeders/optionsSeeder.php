<?php

namespace Database\Seeders;

use App\Models\options;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class optionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        options::create([
            'question_id' => 1,
            'option' => 'Paris',
            'is_correct' => true,
        ]);
    }
}
