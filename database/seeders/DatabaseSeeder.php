<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\JawabanPenggunaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Panggil seeder 
        $this->call([
            //UserSeeder::class,
            // KelasSeeder::class,
            // RuangKelasSeeder::class,
            // SiswaSeeder::class,
            // SiswaBerprestasiSeeder::class,
            // KaryawanSeeder::class,
            // GuruSeeder::class,
            // MapelSeeder::class,
            // MateriSeeder::class,
            // TugasSeeder::class,
            // PertanyaanSeeder::class,
            // OpsiSeeder::class,
            // JawabanPenggunaSeeder::class,
            // KegiatanPenggunaSeeder::class,
            // PenghargaanSeeder::class,
            // LogPenggunaSeeder::class,
            //PengumumanSeeder::class,
            // NilaiSeeder::class,
            // PivotTableSeeder::class
        ]);
    }
}
