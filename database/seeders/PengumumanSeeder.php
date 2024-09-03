<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PengumumanSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $data[] = [
                'judul' => 'Pengumuman ' . $i,
                'keterangan' => 'Ini adalah keterangan pengumuman ke-' . $i . '. ' . Str::random(50),
                'tanggal' => now()->subDays(rand(0, 365))->format('Y-m-d'),
                'waktu' => now()->subMinutes(rand(0, 1440))->format('H:i:s'),
                'tempat' => $i % 2 == 0 ? 'Aula Sekolah' : null,
                'gambar' => $i % 3 == 0 ? 'gambar' . $i . '.jpg' : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tbl_pengumuman')->insert($data);
    }
}
