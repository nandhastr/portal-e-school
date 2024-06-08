<?php

namespace Database\Seeders;

use App\Models\Tugas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tugas::create([
            'id_siswa' => 1,
            'id_kelas' => 1,
            'judul' => 'Tugas Matematika 1',
            'deskripsi' => 'Tugas mengenai operasi bilangan dasar.',
            'file_path' => 'tugas1.pdf',
            'deadline' => '2024-06-15',
            'status' => 'Belum Selesai',
        ]);

        Tugas::create([
            'id_siswa' => 2,
            'id_kelas' => 2,
            'judul' => 'Tugas Bahasa Inggris 1',
            'deskripsi' => 'Tugas tentang pengenalan kata-kata dasar dalam bahasa Inggris.',
            'file_path' => 'tugas2.pdf',
            'deadline' => '2024-06-20',
            'status' => 'Belum Selesai',
        ]);
    }
}
