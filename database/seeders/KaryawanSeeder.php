<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $genre = $i % 2 == 0 ? 'laki-laki' : 'Perempuan';
            $nama = $genre == 'laki-laki' ? 'Karyawan Laki-laki ' . $i : 'Karyawan Perempuan ' . $i;

            $data[] = [
                'nip' => 'NIP' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'nama' => $nama,
                'status' => $i % 3 == 0 ? 'Tetap' : 'Kontrak',
                'genre' => $genre,
                'tempat_lahir' => $i % 2 == 0 ? 'Kota ' . $i : null,
                'tanggal_lahir' => $i % 2 == 0 ? now()->subYears(rand(25, 40))->format('Y-m-d') : null,
                'jabatan' => 'Staf ' . Str::random(5),
                'email' => 'karyawan' . $i . '@perusahaan.com',
                'telepon' => '0812' . rand(1000000, 9999999),
                'gambar' => $i % 4 == 0 ? 'karyawan' . $i . '.jpg' : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tbl_karyawan')->insert($data);
    }
}
