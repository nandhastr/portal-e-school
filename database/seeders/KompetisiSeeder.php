<?php

namespace Database\Seeders;

use App\Models\Kompetisi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KompetisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kompetisi::create([
            'id_siswa' => 1,
            'judul' => 'Kompetisi Sains Nasional',
            'deskripsi' => 'Kompetisi tingkat nasional di bidang sains.',
            'tanggal_partisipasi' => '2023-07-15',
            'hasil' => 'Juara 1',
        ]);

        Kompetisi::create([
            'id_siswa' => 2,
            'judul' => 'Kompetisi Debat Bahasa Inggris',
            'deskripsi' => 'Kompetisi debat bahasa Inggris antar sekolah.',
            'tanggal_partisipasi' => '2023-08-20',
            'hasil' => 'Juara 2',
        ]);
    }
}
