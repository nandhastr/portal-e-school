<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Kelas::create([
            'nama' => 'Kelas A',
            'tingkat' => 'X',
        ]);

        Kelas::create([
            'nama' => 'Kelas B',
            'tingkat' => 'XI',
        ]);
    }
}
