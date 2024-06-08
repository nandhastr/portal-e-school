<?php

namespace App\Http\Controllers;

use App\Models\Opsi;
use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\Ujian;
use App\Models\Materi;
use App\Models\Nilai;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tugas_upload()
    {
        $user = Auth::user();
        $tugas = Nilai::with(['kelas', 'siswa', 'materi', 'ujian', 'tugas'])->get();
        $data = [
            'tugas' => $tugas,
            'user' => $user,
            'title' => 'Halaman Upload tugas',
        ];
        return view('elearning.guru.tugas-upload-page', $data);
    }

    public function materi_upload()
    {
        $user = Auth::user();
        $materi = Materi::with('kelas')->get();
        $data = [
            'materi' => $materi,
            // 'materi' => Materi::all(),
            'user' => $user,
            'title' => 'Halaman Upload Materi',
        ];

        return view('elearning.guru.materi-upload-page', $data);
    }

    public function soal_page()
    {
        $user = Auth::user();
        $soal = Pertanyaan::with(['kelas', 'opsi', 'materi'])->get();
        $data = [
            'title' => 'Halaman Data Soal',
            'soal' => $soal,
            'user' => $user

        ];
        // \dd($data);
        return view('elearning.guru.soal-upload-page', $data);
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
