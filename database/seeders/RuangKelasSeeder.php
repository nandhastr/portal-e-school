<?php

namespace Database\Seeders;

use App\Models\RuangKelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuangKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RuangKelas::create(['nama' => 'A', 'id_kelas' => 1]);
        RuangKelas::create(['nama' => 'B', 'id_kelas' => 1]);
        RuangKelas::create(['nama' => 'C', 'id_kelas' => 1]);

        RuangKelas::create(['nama' => 'A', 'id_kelas' => 2]);
        RuangKelas::create(['nama' => 'B', 'id_kelas' => 2]);
        RuangKelas::create(['nama' => 'C', 'id_kelas' => 2]);

        RuangKelas::create(['nama' => 'A', 'id_kelas' => 3]);
        RuangKelas::create(['nama' => 'B', 'id_kelas' => 3]);
        RuangKelas::create(['nama' => 'C', 'id_kelas' => 3]);
    }
}
