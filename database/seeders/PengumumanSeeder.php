<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengumuman::create([
            'judul' => 'Libur Nasional',
            'konten' => 'Sekolah akan libur pada tanggal 17 Agustus 2023 untuk memperingati Hari Kemerdekaan.',
        ]);

        Pengumuman::create([
            'judul' => 'Pembagian Rapor',
            'konten' => 'Pembagian rapor semester ganjil akan dilaksanakan pada tanggal 20 Desember 2023.',
        ]);
    }
}
