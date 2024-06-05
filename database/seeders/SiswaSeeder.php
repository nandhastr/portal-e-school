<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'id_kelas' => 1,
            'user_id' => 1,
            'angkatan' => '2022',
            'status' => 'Aktif',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2005-05-10',
            'alamat' => 'Jl. Raya No. 123',
            'nama_ibu' => 'Ibu Siswa',
            'foto' => 'siswa1.jpg',
            'sekolah_sebelumnya' => 'SMP Negeri 1 Jakarta',
            'nisn' => '1234567890',
            'phone' => '081234567890',
            'gender' => 'Laki-laki',
            'tahun_masuk' => '2022',
            'kelas_sekarang' => 'XII',
            'status_beasiswa' => 'Aktif',
            'catatan_prestasi' => 'Juara 1 Olimpiade Matematika',
            'catatan_disiplin' => 'Siswa yang patuh dan rajin',
            'informasi_kesehatan' => 'Tidak memiliki riwayat penyakit serius',
        ]);

        Siswa::create([
            'id_kelas' => 2,
            'user_id' => 2,
            'angkatan' => '2023',
            'status' => 'Aktif',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2006-08-15',
            'alamat' => 'Jl. Mawar No. 456',
            'nama_ibu' => 'Ibu Siswa 2',
            'foto' => 'siswa2.jpg',
            'sekolah_sebelumnya' => 'SMP Negeri 2 Bandung',
            'nisn' => '0987654321',
            'phone' => '085678901234',
            'gender' => 'Perempuan',
            'tahun_masuk' => '2023',
            'kelas_sekarang' => 'XI',
            'status_beasiswa' => 'Tidak Aktif',
            'catatan_prestasi' => 'Juara 2 Lomba Cerdas Cermat',
            'catatan_disiplin' => 'Siswa yang sopan dan ramah',
            'informasi_kesehatan' => 'Alergi terhadap udara dingin',
        ]);
    }
}
