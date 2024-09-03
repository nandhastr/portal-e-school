<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan_pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KegiatanPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [];

        $kategoriList = ['uks', 'osis', 'pramuka'];
        $tempatList = ['Aula Sekolah', 'Lapangan', 'Ruang OSIS', 'Gedung Serba Guna'];
        
        for ($i = 1; $i <= 30; $i++) {
            $kategori = $kategoriList[array_rand($kategoriList)];
            $tempat = $tempatList[array_rand($tempatList)];

            $data[] = [
                'kategori' => $kategori,
                'judul' => 'Kegiatan ' . ucfirst($kategori) . ' ' . $i,
                'tempat' => $tempat,
                'waktu' => now()->subMinutes(rand(0, 1440))->format('H:i:s'),
                'tanggal' => now()->subDays(rand(0, 365))->format('Y-m-d'),
                'deskripsi' => 'Deskripsi untuk kegiatan ' . $kategori . ' ' . $i . '. ' . Str::random(50),
                'gambar' => $i % 4 == 0 ? 'kegiatan' . $i . '.jpg' : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tbl_kegiatan')->insert($data);
    }
}
