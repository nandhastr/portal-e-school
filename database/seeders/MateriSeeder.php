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
            'judul' => 'Dasar-Dasar Matematika',
            'konten' => 'Materi tentang dasar-dasar matematika termasuk operasi bilangan dasar.',
            'mata_pelajaran' => 'Matematika',
        ]);

        Materi::create([
            'judul' => 'Pengantar Bahasa Inggris',
            'konten' => 'Materi pengantar tentang dasar-dasar bahasa Inggris.',
            'mata_pelajaran' => 'Bahasa Inggris',
        ]);
    }
}
