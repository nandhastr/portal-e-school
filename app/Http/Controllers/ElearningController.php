<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Penghargaan;
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
        $siswa = null; // Variabel $siswa diinisialisasi dengan null

        // Cek apakah pengguna adalah admin atau guru
        if ($user->role === 'admin' || $user->role === 'guru') {
            // Jika admin atau guru, ambil data siswa
            $siswa = Siswa::all();
        }

        // Inisialisasi variabel penghargaan, kegiatan, nilai, dan kelas
        $penghargaan = [];
        $kegiatan = [];
        $nilai = [];
        $kelas = [];

        // Jika pengguna memiliki relasi siswa, ambil data yang terkait
        if ($user->role === 'siswa') {
            $siswa = $user->siswa;
            $siswa->load('penghargaan', 'nilai', 'kegiatan_pengguna', 'kelas');

            $penghargaan = $siswa->penghargaan;
            $kelas = $siswa->kelas;
            $nilai = $siswa->nilai;
            $kegiatan = $siswa->kegiatan_pengguna;
        }

        // Jika ada siswa yang terkait, ambil semua data penghargaan
        if ($siswa) {
            $penghargaan = Penghargaan::all();
        }

        // Data yang akan dikirimkan ke tampilan
        $data = [
            'title' => 'Dashboard',
            'penghargaan' => $penghargaan,
            'nilai' => $nilai,
            'kegiatan' => $kegiatan,
            'user' => $user,
            'kelas' => $kelas,
            'siswa' => $siswa,
        ];

        return view('portal.dashboard-page', $data);
    }
}
