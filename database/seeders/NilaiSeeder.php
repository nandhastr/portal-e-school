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
            'nilai' => 85.00,
            'id_siswa' => 1,
            'id_materi' => 1,
            'id_pertanyaan' => 1,
            'id_tugas' => 1,
            'id_kelas' => 1,
            'id_ruangKelas' => 1
        ]);

        Nilai::create([
            'jenis' => 'UTS',
            'nilai' => 90.50,
            'id_siswa' => 2,
            'id_materi' => 2,
            'id_pertanyaan' => 2,
            'id_tugas' => 2,
            'id_kelas' => 2,
            'id_ruangKelas' => 2
        ]);
    }
}
