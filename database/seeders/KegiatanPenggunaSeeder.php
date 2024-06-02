<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan_pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KegiatanPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kegiatan_pengguna::create([
            'id_siswa' => 1,
            'kegiatan' => 'Olimpiade Matematika',
            'tanggal_kegiatan' => '2023-05-12',
            'deskripsi' => 'Kompetisi matematika tingkat nasional.',
        ]);

        Kegiatan_pengguna::create([
            'id_siswa' => 2,
            'kegiatan' => 'Lomba Cerdas Cermat',
            'tanggal_kegiatan' => '2023-06-15',
            'deskripsi' => 'Lomba cerdas cermat antar sekolah.',
        ]);
    }
}
