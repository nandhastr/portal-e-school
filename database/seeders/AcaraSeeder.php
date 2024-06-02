<?php

namespace Database\Seeders;

use App\Models\Acara;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Acara::create([
            'id_siswa' => 1,
            'judul' => 'Pentas Seni',
            'deskripsi' => 'Acara pentas seni tahunan sekolah.',
            'tanggal_acara' => '2023-09-10',
            'lokasi' => 'Aula Sekolah',
        ]);

        Acara::create([
            'id_siswa' => 2,
            'judul' => 'Workshop IT',
            'deskripsi' => 'Workshop tentang teknologi informasi.',
            'tanggal_acara' => '2023-10-05',
            'lokasi' => 'Laboratorium Komputer',
        ]);
    }
}
