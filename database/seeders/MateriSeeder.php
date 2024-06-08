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
            'judul' => 'Dasar-Dasar Matematika',
            'konten' => 'Materi tentang dasar-dasar matematika termasuk operasi bilangan dasar.',
            'mata_pelajaran' => 'Matematika',
            'file_path' => 'materi1.pdf'
        ]);

        Materi::create([
            'id_kelas' => 2,
            'judul' => 'Pengantar Bahasa Inggris',
            'konten' => 'Materi pengantar tentang dasar-dasar bahasa Inggris.',
            'mata_pelajaran' => 'Bahasa Inggris',
            'file_path' => 'materi2.pdf'
        ]);
    }
}
