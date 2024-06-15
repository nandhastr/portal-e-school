<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class CrudKelasController extends Controller
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
            'tingkat' => 'required',
        ]);
        // dd($validate);

        Kelas::create($validate);

        return redirect()->route('data-kelas-page')->with('success', 'Data berhasil ditambahkan.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'tingkat' => 'required',
        ]);
        // dd($validate);
        $kelas = Kelas::findOrFail($id);
        $kelas->tingkat = $validate['tingkat'];

        $kelas->update();

        return redirect()->route('data-kelas-page')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('data-kelas-page')->with('success', 'Kelas berhasil dihapus.');
    }
}
