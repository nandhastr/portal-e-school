<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Panggil seeder lain di sini
        $this->call([
            UserSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            GuruSeeder::class,
            MateriSeeder::class,
            TugasSeeder::class,
            UjianSeeder::class,
            PertanyaanSeeder::class,
            UjianPertanyaanSeeder::class,
            OpsiSeeder::class,
            JawabanPenggunaSeeder::class,
            KegiatanPenggunaSeeder::class,
            PenghargaanSeeder::class,
            KompetisiSeeder::class,
            AcaraSeeder::class,
            LogPenggunaSeeder::class,
            PengumumanSeeder::class,
            NilaiSeeder::class,
        ]);
    }
}
