<?php

namespace App\Http\Controllers;

use App\Models\RuangKelas;
use Illuminate\Http\Request;

class CrudRuanganController extends Controller
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
        $request->validate([
            'nama' => 'required',
            'id_kelas' => 'required'
        ]);

        $ruangan = new RuangKelas;
        $ruangan->nama = $request->nama;
        $ruangan->id_kelas = $request->id_kelas;

        $ruangan->save();

        return redirect()->route('data-ruangan-page')->with('success', ' Data Berhasil di tambahkan');
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
        $request->validate([
            'nama' => 'required',
            'id_kelas' => 'required'
        ]);

        $ruangan = RuangKelas::findOrFail($id);
        $ruangan->nama = $request->nama;
        $ruangan->id_kelas = $request->id_kelas;
        $ruangan->update();
        return redirect()->route('data-ruangan-page')->with('success', ' Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruang = RuangKelas::findOrFail($id);
        $ruang->delete();

        return redirect()->route('data-ruangan-page')->with('success', 'Ruang Kelas berhasil dihapus.');
    }
}
