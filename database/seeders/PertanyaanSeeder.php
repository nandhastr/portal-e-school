<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pertanyaan::create([
            'pertanyaan' => 'Apa hasil dari 2 + 2?',
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Terjemahkan kata "apple" ke dalam bahasa Indonesia.',
        ]);
    }
}
