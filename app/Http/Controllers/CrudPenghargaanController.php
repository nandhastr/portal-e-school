<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use Illuminate\Http\Request;

class CrudPenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        dd($request->all());
        $validated =  $request->validate([
            'id_siswa' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_diterima' => 'required'
        ]);
        $penghargaan = new Penghargaan();
        $penghargaan->id_siswa = $validated['id_siswa'];
        $penghargaan->judul = $validated['judul'];
        $penghargaan->deskripsi = $validated['deskripsi'];
        $penghargaan->tanggal_diterima = $validated['tanggal_diterima'];
        // $penghargaan = new Penghargaan();
        // $penghargaan->id_siswa = $request->id_siswa;
        // $penghargaan->judul = $request->judul;
        // $penghargaan->deskripsi = $request->deskripsi;
        // $penghargaan->tanggal_diterima = $request->tanggal_diterima;

        $penghargaan->save();
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
