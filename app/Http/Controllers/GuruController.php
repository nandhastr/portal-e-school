<?php

namespace App\Http\Controllers;

use App\Models\Jawaban_pengguna;
use App\Models\Opsi;
use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\Materi;
use App\Models\Nilai;
use App\Models\Pertanyaan;
use App\Models\RuangKelas;
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
        $tugas = Nilai::with(['kelas.ruangKelas', 'siswa', 'materi', 'tugas'])->get();
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
        $materi = Materi::with(['kelas.ruangKelas', 'mapel'])->get();
        $data = [
            'kelas' => Kelas::all(),
            'ruang' => RuangKelas::all(),
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
        $soal = Pertanyaan::with(['kelas.ruangKelas', 'opsi', 'mapel'])->get();
        $data = [
            'title' => 'Halaman Data Soal',
            'kelas' => Kelas::all(),
            'soal' => $soal,
            'user' => $user

        ];
        // \dd($data);
        return view('elearning.guru.soal-upload-page', $data);
    }
    public function review_page()
    {
        $user = Auth::user();
        $Qna = Jawaban_pengguna::with(['siswa', 'materi', 'pertanyaan', 'kelas.ruangKelas', 'tugas', 'opsi'])->get();
        $data = [
            'title' => 'Halaman Review ',
            'qna' => $Qna,
            'user' => $user,
        ];
        // dd($data['qna']);
        return view('elearning.guru.review-ujian-page', $data);
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
