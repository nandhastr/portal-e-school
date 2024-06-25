<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Alumni;
use App\Models\PortalModel\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AlumniCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Data alumni',
            'user'=> $user,
            'alumni' => Alumni::all(),
        ];
        return view('portal.admin.data-alumni-page', $data);
    }

    

    public function store(Request $request)
    {
        // dd($request->all());
       try {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_lulus' => 'required',
        ]);

        // proses gambar
        $gambar = $request->file('gambar');
        $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/assets/img/alumni'), $nama_gambar);

        // simpan ke db
        $alumni = new Alumni;
        
        $alumni->gambar = $nama_gambar; 
        $alumni->tahun_lulus = $request->tahun_lulus;

        // dd($alumni); 
    // Save  ke database
    $alumni->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
    }

    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, string $id)
    {
    //    dd($request->all());
      try {
        $request->validate([
             'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_lulus' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $alumni = Alumni::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($alumni->gambar && file_exists(base_path('public/assets/img/alumni/' . $alumni->gambar))) {
                unlink(base_path('public/assets/img/alumni/' . $alumni->gambar));
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/alumni'), $nama_gambar);
            $alumni->gambar = $nama_gambar;
        }

        // Perbarui data lainnya
        $alumni->tahun_lulus = $request->tahun_lulus;
        // dd($alumni);
        $alumni->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
        // Temukan record berdasarkan ID
        $alumni = Alumni::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($alumni->gambar) {
            $gambarPath = public_path('assets/img/alumni/' . $alumni->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus record dari database
        $alumni->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }

  
}
