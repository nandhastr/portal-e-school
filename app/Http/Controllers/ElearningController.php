<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\awards;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Opsi;
use App\Models\Penghargaan;
use App\Models\Pertanyaan;
use App\Models\Siswa;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElearningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // Periksa apakah pengguna memiliki relasi 
        $siswa = $user->siswa ?? null;
        // Inisialisasi variabel menjadi array kosong
        $penghargaan = [];
        $kegiatan = [];
        $nilai = [];

        // Jika pengguna memiliki relasi siswa, ambil penghargaan siswa
        if ($siswa) {
            $penghargaan = $siswa->penghargaan;

            // Ambil data dari tabel nilai melalui relasi siswa
            $nilai = $siswa->nilai;

            // Ambil data dari tabel kegiatan melalui relasi siswa
            $kegiatan = $siswa->kegiatan_pengguna;

            // // Ambil data dari tabel ujian melalui relasi siswa
            // $ujian = $siswa->ujian;
        }

        return view('elearning.dashboard-page', [
            'user' => $user,
            'siswa' => $siswa,
            'penghargaan' => $penghargaan,
            'nilai' => $nilai,
            'kegiatan' => $kegiatan,
            // 'ujian' => $ujian,
            'title' => 'Dashboard',
        ]);
    }


    public function all_class()
    {
        return view('elearning.siswa.all-class-page', [
            'user' => Auth::user(),
            'title' => 'Semua Kelas'
        ]);
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
        return view('elearning.siswa.profile-class-page', [
            'user' => Auth::user(),
            'title' => 'Profile Kelas'
        ]);
    }

    public function mapel_page()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Mata Pelajaran',
            'mapel' => Materi::all(),
            'user' => $user,
        ];
        // \dd($data);
        return view('elearning.data-mapel-page', $data);
    }

    public function kelas_page()
    {

        $user = Auth::user();
        $data = [
            'title' => 'Halaman Data kelas',
            'kelas' => Kelas::all(),
            'user' => $user,
        ];
        return view('elearning.data-kelas-page', $data);
    }


    public function siswa_page()
    {
        $user = Auth::user();

        $data = [
            'title' => 'Halaman Data Siswa',
            'siswa' => Siswa::all(),
            'kelas' => Kelas::all(),
            'user' => $user

        ];
        // \dd($data);
        return view('elearning.data-siswa-page', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
