<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $genre = $i % 2 == 0 ? 'laki-laki' : 'Perempuan';
            $nama = $genre == 'laki-laki' ? 'Siswa Laki-laki ' . $i : 'Siswa Perempuan ' . $i;

            $data[] = [
                'nis' => 'NIS' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'nama' => $nama,
                'genre' => $genre,
                'kelas' => 'Kelas ' . chr(64 + ($i % 3) + 1), // Menghasilkan kelas A, B, atau C
                'tempat_lahir' => 'Kota ' . $i,
                'tanggal_lahir' => now()->subYears(rand(15, 18))->format('Y-m-d'),
                'alamat' => 'Alamat siswa ' . $i . ', Jalan ' . Str::random(10),
                'gambar' => $i % 5 == 0 ? 'siswa' . $i . '.jpg' : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tbl_siswa')->insert($data);
    }
}
