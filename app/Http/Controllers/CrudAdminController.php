<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
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

        $validate = $request->validate([
            'mata_pelajaran' => 'required',
            'deskripsi' => 'required',
            'tingkat_kelas' => 'required'
        ]);

        Mapel::create($validate);

        return redirect()->route('data-mapel-page')->with('success', 'Data berhasil ditambahkan.');

        // return redirect()->route('data-mapel-page')->with(['success', 'Data Berhasil Di simpan']);
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
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'mata_pelajaran' => 'required',
            'deskripsi' => 'required',
            'tingkat_kelas' => 'required'
        ]);
        $mapel = Mapel::findOrFail($id);
        $mapel->mata_pelajaran = $validate['mata_pelajaran'];
        $mapel->deskripsi = $validate['deskripsi'];
        $mapel->tingkat_kelas = $validate['tingkat_kelas'];
        // dd($mapel);
        $mapel->update();

        return redirect()->route('data-mapel-page')->with('success', 'Data berhasil disimpan.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('data-mapel-page')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
