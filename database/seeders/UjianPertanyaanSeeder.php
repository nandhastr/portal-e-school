<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ujian_pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UjianPertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ujian_pertanyaan::create([
            'id_ujian' => 1,
            'id_pertanyaan' => 1,
        ]);

        Ujian_pertanyaan::create([
            'id_ujian' => 1,
            'id_pertanyaan' => 2,
        ]);

        Ujian_pertanyaan::create([
            'id_ujian' => 2,
            'id_pertanyaan' => 1,
        ]);
    }
}
