<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function mapel_page()
    {
        $user = Auth::user();
        $materi = Materi::with(['mapel', 'kelas'])->get();
        $data = [
            'title' => 'Halaman Data Mata Pelajaran',
            'materi' => $materi,
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
