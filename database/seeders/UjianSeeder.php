<?php

namespace Database\Seeders;

use App\Models\Ujian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ujian::create([
            'judul' => 'Ujian Tengah Semester Matematika',
            'mata_pelajaran' => 'Matematika',
            'durasi' => 90,
            'waktu_mulai' => '2024-07-01 09:00:00',
            'waktu_selesai' => '2024-07-01 10:30:00',
        ]);

        Ujian::create([
            'judul' => 'Ujian Akhir Semester Bahasa Inggris',
            'mata_pelajaran' => 'Bahasa Inggris',
            'durasi' => 120,
            'waktu_mulai' => '2024-07-15 13:00:00',
            'waktu_selesai' => '2024-07-15 15:00:00',
        ]);
    }
}
