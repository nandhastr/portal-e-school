<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\ProfilSekolah;
use App\Models\PortalModel\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CrudProfileSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Profile Sekolah',
            'user'=> $user,
            'profil' => ProfilSekolah::all(),
        ];
        return view('portal.admin.master-profil-sekolah', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
  
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required',
            'konten' => 'required',
        ]);

        // proses gambar
        $gambar = $request->file('gambar');
        $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/assets/img/profil-sekolah'), $nama_gambar);

        // simpan ke db
        $profil = new ProfilSekolah;
        
        $profil->gambar = $nama_gambar; 
        $profil->kategori = $request->kategori;
        $profil->konten = $request->konten;

        // dd($profil); 
        
        if($profil->save()){
                return redirect()->back()->with('success', 'Data berhasil Di tambahkan');
            }else{
            return redirect()->back()->withInput();
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
            'kategori' => 'required',
            'konten' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $profil = ProfilSekolah::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($profil->gambar && file_exists(base_path('public/assets/img/profil-sekolah/' . $profil->gambar))) {
                unlink(base_path('public/assets/img/profil-sekolah/' . $profil->gambar));
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/profil-sekolah'), $nama_gambar);
            $profil->gambar = $nama_gambar;
        }

        // Perbarui data lainnya
        $profil->kategori = $request->kategori;
        $profil->konten = $request->konten;

        $profil->save();

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
        $profil = ProfilSekolah::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($profil->gambar) {
            $gambarPath = public_path('assets/img/profil-sekolah/' . $profil->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus record dari database
        $profil->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
