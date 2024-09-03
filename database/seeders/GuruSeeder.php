<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GuruSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $genre = $i % 2 == 0 ? 'laki-laki' : 'Perempuan';
            $nama = $genre == 'laki-laki' ? 'Guru Laki-laki ' . $i : 'Guru Perempuan ' . $i;

            $data[] = [
                'nip' => 'NIP' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'nama' => $nama,
                'status' => $i % 3 == 0 ? 'Tetap' : 'Honorer',
                'genre' => $genre,
                'tempat_lahir' => $i % 2 == 0 ? 'Kota ' . $i : null,
                'tanggal_lahir' => $i % 2 == 0 ? now()->subYears(rand(25, 40))->format('Y-m-d') : null,
                'jabatan' => 'Guru ' . Str::random(5),
                'email' => 'guru' . $i . '@sekolah.ac.id',
                'telepon' => '0812' . rand(1000000, 9999999),
                'gambar' => $i % 4 == 0 ? 'guru' . $i . '.jpg' : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tbl_guru')->insert($data);
    }
}
