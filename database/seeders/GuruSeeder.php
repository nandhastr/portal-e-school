<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nipn' => '123634636',
            'user_id' => 3,
            'photo' => 'guru1.jpg',
            'gender' => 'Laki-laki',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '1980-10-20',
            'alamat' => 'Jl. Kebon Sirih No. 789',
            'phone' => '087654321098',
            'pendidikan_terakhir' => 's2',
            'spesialisasi' => 'Matematika',
            'kualifikasi' => 'S2 Pendidikan Matematika',
            'pengalaman' => '2 tahun',
        ]);

        Guru::create([
            'nipn' => '145445463',
            'user_id' => 3,
            'photo' => 'guru2.jpg',
            'gender' => 'Perempuan',
            'tempat_lahir' => 'Semarang',
            'tanggal_lahir' => '1975-03-15',
            'alamat' => 'Jl. Diponegoro No. 123',
            'phone' => '082345678901',
            'pendidikan_terakhir' => 's1',
            'spesialisasi' => 'Bahasa Inggris',
            'kualifikasi' => 'S1 Pendidikan Bahasa Inggris',
            'pengalaman' => '5 tahun',
        ]);
    }
}
