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
            'user_id' => 3,
            'id_kelas' => 1,
            'mata_pelajaran' => 'Matematika',
            'deskripsi' => 'Pelajaran Matematika dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Mapel::create([
            'user_id' => 3,
            'id_kelas' => 2,
            'mata_pelajaran' => 'Fisika',
            'deskripsi' => 'Pelajaran Fisika dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Mapel::create([
            'user_id' => 3,
            'id_kelas' => 1,
            'mata_pelajaran' => 'Kimia',
            'deskripsi' => 'Pelajaran Kimia dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Mapel::create([
            'user_id' => 3,
            'id_kelas' => 3,
            'mata_pelajaran' => 'Biologi',
            'deskripsi' => 'Pelajaran Biologi dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Mapel::create([
            'user_id' => 3,
            'id_kelas' => 2,
            'mata_pelajaran' => 'Bahasa Inggris',
            'deskripsi' => 'Pelajaran Bahasa Inggris dasar untuk tingkat SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
