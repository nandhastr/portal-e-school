<?php

namespace Database\Seeders;

use App\Models\Jawaban_pengguna;
use Illuminate\Database\Seeder;

class JawabanPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jawaban_pengguna::create([
            'id_siswa' => 1,
            'id_materi' => 1,
            'id_pertanyaan' => 1,
            'id_kelas' => 1,
            'id_tugas' => 1,
            'id_opsi' => 1,
            'jawaban' => '3',
            'nilai' => 90,
            'status' => 'tidak lulus'
        ]);

        Jawaban_pengguna::create([
            'id_siswa' => 1,
            'id_materi' => 2,
            'id_pertanyaan' => 2,
            'id_kelas' => 1,
            'id_tugas' => 1,
            'id_opsi' => 4,
            'jawaban' => 'apel',
            'nilai' => 85,
            'status' => 'lulus'
        ]);

        Jawaban_pengguna::create([
            'id_siswa' => 2,
            'id_materi' => 1,
            'id_pertanyaan' => 1,
            'id_kelas' => 1,
            'id_tugas' => 1,
            'id_opsi' => 1,
            'jawaban' => '2',
            'nilai' => 95,
            'status' => 'tidak lulus'
        ]);

        Jawaban_pengguna::create([
            'id_siswa' => 2,
            'id_materi' => 2,
            'id_pertanyaan' => 2,
            'id_kelas' => 1,
            'id_tugas' => 1,
            'id_opsi' => 4,
            'jawaban' => 'apel',
            'nilai' => 80,
            'status' => 'lulus'
        ]);
    }
}
