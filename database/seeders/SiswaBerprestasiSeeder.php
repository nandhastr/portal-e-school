<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaBerprestasiSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $kategoriList = ['akademik', 'non_akademik'];
        $siswaIds = DB::table('tbl_siswa')->pluck('id')->toArray();

        for ($i = 1; $i <= 30; $i++) {
            $kategori = $kategoriList[array_rand($kategoriList)];
            $siswaId = $siswaIds[array_rand($siswaIds)];

            $data[] = [
                'prestasi' => 'Prestasi ' . $kategori . ' ' . $i,
                'kategori' => $kategori,
                'tahun' => rand(2010, 2023),
                'siswa_id' => $siswaId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tbl_siswa_berprestasi')->insert($data);
    }
}
