<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kegiatan_pengguna;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Materi;
use App\Models\Penghargaan;
use App\Models\Pengumuman;
use App\Models\RuangKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function guru_page()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Guru',
            'guru' => Guru::all(),
            'user' => $user

        ];
        // \dd($data);
        return view('elearning.admin.data-guru-page', $data);
    }



    public function siswa_page()
    {
        $user = Auth::user();
        $siswa = Siswa::with(['kelas'])->get();
        $data = [
            'title' => 'Halaman Data Siswa',
            'kelas' => Kelas::all(),
            'siswa' => $siswa,
            'user' => $user

        ];
        // \dd($data);
        return view('elearning.admin.data-siswa-page', $data);
    }



    public function mapel_page()
    {
        $user = Auth::user();
        $mapel = Mapel::with(['siswa', 'kelas'])->get();
        $data = [
            'title' => 'Halaman Data Mata Pelajaran',
            'mapel' => $mapel,
            'kelas' => Kelas::all(),
            'user' => $user,
        ];
        // \dd($data);
        return view('elearning.admin.data-mapel-page', $data);
    }



    public function kelas_page()
    {

        $user = Auth::user();
        $data = [
            'title' => 'Halaman Data kelas',
            'kelas' => Kelas::all(),
            'user' => $user,
        ];
        // dd($data);
        return view('elearning.admin.data-kelas-page', $data);
    }


    public function ruangan_page()
    {
        $ruang = RuangKelas::with('kelas')->get();
        $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Ruang Kelas',
            'ruang' => $ruang,
            'kelas' => Kelas::all(),
            'user' => $user,
        ];
        // dd($data);
        return view('elearning.admin.data-ruangan-page', $data);
    }


    public function pengumuman_page()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Pengumuman',
            'pengumuman' => Pengumuman::all(),
            'user' => $user,
        ];
        // dd($data);
        return view('elearning.admin.data-pengumuman-page', $data);
    }


    public function penghargaan_page()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Penghargaan',
            'reward' => Penghargaan::all(),
            'user' => $user,
        ];
        // dd($data);
        return view('elearning.admin.data-penghargaan-page', $data);
    }


    public function kegiatan_page()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Kegiatan',
            'kegiatan' => Kegiatan_pengguna::all(),
            'user' => $user,
        ];
        // dd($data);
        return view('elearning.admin.data-kegiatan-page', $data);
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
