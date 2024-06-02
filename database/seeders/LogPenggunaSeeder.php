<?php

namespace Database\Seeders;

use App\Models\Log_pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LogPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log_pengguna::create([
            'id_pengguna' => 1,
            'aksi' => 'Login',
            'deskripsi' => 'Pengguna berhasil login.',
        ]);

        Log_pengguna::create([
            'id_pengguna' => 2,
            'aksi' => 'Logout',
            'deskripsi' => 'Pengguna berhasil logout.',
        ]);
    }
}
