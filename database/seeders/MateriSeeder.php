<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materi::create([
            'id_kelas' => 1,
            'id_ruangKelas' => 1,
            'judul' => 'Dasar-Dasar Matematika',
            'konten' => 'Materi tentang dasar-dasar matematika termasuk operasi bilangan dasar.',
            'id_mapel' => '1',
            'file_path' => 'materi1.pdf'
        ]);

        Materi::create([
            'id_kelas' => 2,
            'id_ruangKelas' => 2,
            'judul' => 'Pengantar Bahasa Inggris',
            'konten' => 'Materi pengantar tentang dasar-dasar bahasa Inggris.',
            'id_mapel' => '4',
            'file_path' => 'materi2.pdf'
        ]);
        Materi::create([
            'id_kelas' => 3,
            'id_ruangKelas' => 3,
            'judul' => 'Pengantar Bahasa Inggris',
            'konten' => 'Materi pengantar tentang dasar-dasar bahasa Inggris.',
            'id_mapel' => '4',
            'file_path' => 'materi2.pdf'
        ]);
    }
}
