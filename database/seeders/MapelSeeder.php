<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mapel::create([
            'id_siswa' => 2,
            'id_kelas' => 1,
            'tingkat_kelas' => 'X',
            'mata_pelajaran' => 'Matematika',
            'deskripsi' => 'Pelajaran Matematika dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Mapel::create([
            'id_siswa' => 2,
            'id_kelas' => 2,
            'tingkat_kelas' => 'XI',
            'mata_pelajaran' => 'Fisika',
            'deskripsi' => 'Pelajaran Fisika dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Mapel::create([
            'id_siswa' => 2,
            'id_kelas' => 1,
            'tingkat_kelas' => 'X',
            'mata_pelajaran' => 'Kimia',
            'deskripsi' => 'Pelajaran Kimia dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Mapel::create([
            'id_siswa' => 1,
            'id_kelas' => 3,
            'tingkat_kelas' => 'XII',
            'mata_pelajaran' => 'Biologi',
            'deskripsi' => 'Pelajaran Biologi dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Mapel::create([
            'id_siswa' => 1,
            'id_kelas' => 2,
            'tingkat_kelas' => 'XI',
            'mata_pelajaran' => 'Bahasa Inggris',
            'deskripsi' => 'Pelajaran Bahasa Inggris dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
