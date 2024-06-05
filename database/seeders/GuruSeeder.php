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
            'user_id' => 1,
            'spesialisasi' => 'Matematika',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '1980-10-20',
            'alamat' => 'Jl. Kebon Sirih No. 789',
            'phone' => '087654321098',
            'gender' => 'Laki-laki',
            'photo' => 'guru1.jpg',
            'tanggal_mulai' => '2010-08-01',
            'kualifikasi' => 'S2 Pendidikan Matematika',
            'pengalaman' => 10,
        ]);

        Guru::create([
            'user_id' => 2,
            'spesialisasi' => 'Bahasa Inggris',
            'tempat_lahir' => 'Semarang',
            'tanggal_lahir' => '1975-03-15',
            'alamat' => 'Jl. Diponegoro No. 123',
            'phone' => '082345678901',
            'gender' => 'Perempuan',
            'photo' => 'guru2.jpg',
            'tanggal_mulai' => '2005-05-01',
            'kualifikasi' => 'S1 Pendidikan Bahasa Inggris',
            'pengalaman' => 15,
        ]);
    }
}
