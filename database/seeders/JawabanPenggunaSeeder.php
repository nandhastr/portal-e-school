<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jawaban_pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JawabanPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jawaban_pengguna::create([
            'id_siswa' => 1,
            'id_pertanyaan' => 1,
            'id_opsi' => 1,
        ]);

        Jawaban_pengguna::create([
            'id_siswa' => 1,
            'id_pertanyaan' => 2,
            'id_opsi' => 4,
        ]);

        Jawaban_pengguna::create([
            'id_siswa' => 2,
            'id_pertanyaan' => 1,
            'id_opsi' => 3,
        ]);

        Jawaban_pengguna::create([
            'id_siswa' => 2,
            'id_pertanyaan' => 2,
            'id_opsi' => 5,
        ]);
    }
}
