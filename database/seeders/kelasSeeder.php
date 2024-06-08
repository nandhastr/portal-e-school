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
            'nama' => 'A',
            'tingkat' => 'X',
        ]);

        Kelas::create([
            'nama' => 'B',
            'tingkat' => 'X',
        ]);
        Kelas::create([
            'nama' => 'C',
            'tingkat' => 'X',
        ]);
        Kelas::create([
            'nama' => 'A',
            'tingkat' => 'XI',
        ]);

        Kelas::create([
            'nama' => 'B',
            'tingkat' => 'XI',
        ]);
        Kelas::create([
            'nama' => 'C',
            'tingkat' => 'XI',
        ]);
        Kelas::create([
            'nama' => 'A',
            'tingkat' => 'XII',
        ]);

        Kelas::create([
            'nama' => 'B',
            'tingkat' => 'XII',
        ]);
        Kelas::create([
            'nama' => 'C',
            'tingkat' => 'XII',
        ]);
    }
}
