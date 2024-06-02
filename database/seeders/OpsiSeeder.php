<?php

namespace Database\Seeders;

use App\Models\Opsi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Opsi::create([
            'id_pertanyaan' => 1,
            'opsi' => '4',
            'benar' => true,
        ]);

        Opsi::create([
            'id_pertanyaan' => 1,
            'opsi' => '3',
            'benar' => false,
        ]);

        Opsi::create([
            'id_pertanyaan' => 1,
            'opsi' => '2',
            'benar' => false,
        ]);

        Opsi::create([
            'id_pertanyaan' => 2,
            'opsi' => 'apel',
            'benar' => true,
        ]);

        Opsi::create([
            'id_pertanyaan' => 2,
            'opsi' => 'buah',
            'benar' => false,
        ]);
    }
}
