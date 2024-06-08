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
            'id_kelas' => 1,
            'id_materi' => 1,
            'pertanyaan' => 'Apa hasil dari 2 + 2?',
            'type' => 'UTS',
            'durasi' => 60,
            'waktu_mulai' => '2024-07-15 13:00:00',
            'waktu_selesai' => '2024-07-15 15:00:00',
        ]);

        Pertanyaan::create([
            'id_kelas' => 2,
            'id_materi' => 2,
            'pertanyaan' => 'Terjemahkan kata "apple" ke dalam bahasa Indonesia.',
            'type' => 'UAS',
            'durasi' => 90,
            'waktu_mulai' => '2024-07-15 13:00:00',
            'waktu_selesai' => '2024-07-15 15:00:00',
        ]);
    }
}
