<?php

namespace Database\Seeders;

use App\Models\Kegiatan_pengguna;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Penghargaan;
use App\Models\RuangKelas;
use App\Models\Tugas;
use Illuminate\Database\Seeder;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk pivot siswa_kelas
        $siswa1 = Siswa::find(1);
        $siswa2 = Siswa::find(2);
        $kelas1 = Kelas::find(1);
        $kelas2 = Kelas::find(2);

        // Attach siswa ke kelas
        $siswa1->kelas()->save($kelas1);
        $siswa2->kelas()->save($kelas2);

        // Seeder untuk pivot siswa_mapel
        $mapel1 = Mapel::find(1);
        $mapel2 = Mapel::find(2);

        // save siswa ke mapel
        $siswa1->mapel()->save($mapel1);
        $siswa2->mapel()->save($mapel2);

        // Seeder untuk pivot siswa_penghargaan
        $penghargaan1 = Penghargaan::find(1);
        $penghargaan2 = Penghargaan::find(2);

        // save siswa ke penghargaan
        $siswa1->penghargaan()->save($penghargaan1);
        $siswa2->penghargaan()->save($penghargaan2);

        // Seeder untuk pivot siswa_kegiatan_pengguna
        $kegiatan1 = Kegiatan_pengguna::find(1);
        $kegiatan2 = Kegiatan_pengguna::find(2);

        // save siswa ke kegiatan_pengguna
        $siswa1->kegiatan_pengguna()->save($kegiatan1);
        $siswa2->kegiatan_pengguna()->save($kegiatan2);

        // Seeder untuk pivot siswa_ruangkelas
        $ruangKelas1 = RuangKelas::find(1);
        $ruangKelas2 = RuangKelas::find(2);

        // save siswa ke ruang kelas
        $siswa1->ruangKelas()->save($ruangKelas1);
        $siswa2->ruangKelas()->save($ruangKelas2);

        // Seeder untuk pivot siswa_tugas
        $tugas1 = Tugas::find(1);
        $tugas2 = Tugas::find(2);

        // save siswa ke tugas
        $siswa1->tugas()->save($tugas1);
        $siswa2->tugas()->save($tugas2);
    }
}
