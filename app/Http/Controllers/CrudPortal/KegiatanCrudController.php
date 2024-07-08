<?php

namespace App\Http\Controllers\CrudPortal;

use Illuminate\Http\Request;
use App\Models\PortalModel\Kegiatan;
use App\Models\PortalModel\Komponen;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class KegiatanCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Data kegiatan',
            'user'=> $user,
            'kegiatan' => Kegiatan::all(),
        ];
        return view('portal.admin.data-kegiatan-page', $data);
    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required',
            'judul' => 'required',
            'tempat' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
        ]);

        // proses gambar
        $gambar = $request->file('gambar');
        $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/assets/img/kegiatan'), $nama_gambar);

        // simpan ke db
        $kegiatan = new Kegiatan;
        
        $kegiatan->gambar = $nama_gambar; 
        $kegiatan->kategori = $request->kategori;
        $kegiatan->judul = $request->judul;
        $kegiatan->tempat = $request->tempat;
        $kegiatan->waktu = $request->waktu;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->deskripsi = $request->deskripsi;
        
        // dd($kegiatan); 

        $kegiatan->save();
        
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
    }
    }



    // metod update
    public function update(Request $request, string $id)
    {
        //  dd($request->all());
      try {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'kategori' => 'required',
            'judul' => 'required',
            'tempat' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $kegiatan = Kegiatan::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kegiatan->gambar && file_exists(base_path('public/assets/img/kegiatan/' . $kegiatan->gambar))) {
                unlink(base_path('public/assets/img/kegiatan/' . $kegiatan->gambar));
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/kegiatan'), $nama_gambar);
            $kegiatan->gambar = $nama_gambar;
        }

        // Perbarui data lainnya
        $kegiatan->kategori = $request->kategori;
        $kegiatan->judul = $request->judul;
        $kegiatan->tempat = $request->tempat;
        $kegiatan->waktu = $request->waktu;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->deskripsi = $request->deskripsi;
        // dd($kegiatan);
        $kegiatan->save();

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
        $kegiatan = Kegiatan::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($kegiatan->gambar) {
            $gambarPath = public_path('assets/img/kegiatan/' . $kegiatan->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus record dari database
        $kegiatan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
