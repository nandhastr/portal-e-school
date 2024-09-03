<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function all_class()
    {
        $user = Auth::user();
        $data = [
            'user' => $user,
            'title' => 'Semua Kelas',
        ];

        return view('elearning.siswa.all-class-page', $data);
    }
    public function uts()
    {
        return view('elearning.siswa.ujian-page', [
            'user' => Auth::user(),
            'title' => 'Halaman Ujian Tengah Semester'
        ]);
    }
    public function uas()
    {
        return view('elearning.siswa.ujian-page', [
            'user' => Auth::user(),
            'title' => 'Halaman Ujian Akhir Semester'
        ]);
    }
    public function un()
    {
        return view('elearning.siswa.ujian-page', [
            'user' => Auth::user(),
            'title' => 'Halaman Ujian Nasional'
        ]);
    }

    public function profile_class()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan data siswa terkait
        $siswa = $user->siswa;

        // Jika siswa ditemukan
        if ($siswa) {
            // Mendapatkan data kelas siswa
            $kelas = $siswa->kelas;

            // Mendapatkan data mata pelajaran siswa
            $mapel = $siswa->mapel;

            // Mendapatkan data penghargaan siswa
            $penghargaan = $siswa->penghargaan;

            // Mendapatkan data kegiatan siswa
            $kegiatan = $siswa->kegiatan_pengguna;

            // Mendapatkan data ruang kelas siswa
            $ruangKelas = $siswa->ruangKelas;

            // Mendapatkan data tugas siswa
            $tugas = $siswa->tugas;

            // Mengirim semua data ke view
            $data = [
                'title' => 'Profile Kelas',
                'user' => $user,
                'siswa' => $siswa,
                'kelas' => $kelas,
                'mapel' => $mapel,
                'penghargaan' => $penghargaan,
                'kegiatan' => $kegiatan,
                'ruangKelas' => $ruangKelas,
                'tugas' => $tugas,
            ];

            return view('elearning.siswa.profile-class-page', $data);
        }
    }

}
