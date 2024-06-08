<?php

namespace Database\Seeders;

use App\Models\Nilai;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nilai::create([
            'jenis' => 'tugas',
            'id_siswa' => 1,
            'id_materi' => 1,
            'id_pertanyaan' => 1,
            'id_tugas' => 1,
            'id_kelas' => 1,
            'nilai' => 85.00,
        ]);

        Nilai::create([
            'jenis' => 'UTS',
            'id_siswa' => 2,
            'id_materi' => 2,
            'id_pertanyaan' => 2,
            'id_tugas' => 2,
            'id_kelas' => 2,
            'nilai' => 90.50,
        ]);
    }
}
