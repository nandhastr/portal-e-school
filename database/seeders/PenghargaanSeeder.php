<?php

namespace Database\Seeders;

use App\Models\Penghargaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenghargaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penghargaan::create([
            'id_siswa' => 1,
            'judul' => 'Juara 1 Olimpiade Matematika',
            'deskripsi' => 'Memenangkan juara pertama dalam olimpiade matematika tingkat nasional.',
            'tanggal_diterima' => '2023-05-20',
        ]);

        Penghargaan::create([
            'id_siswa' => 2,
            'judul' => 'Juara 2 Lomba Cerdas Cermat',
            'deskripsi' => 'Memenangkan juara kedua dalam lomba cerdas cermat antar sekolah.',
            'tanggal_diterima' => '2023-06-20',
        ]);
    }
}
