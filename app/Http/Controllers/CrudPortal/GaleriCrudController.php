<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Galeri;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class GaleriCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'title' => 'Halaman Data galeri',
            'user'=> $user,
            'galeri' => Galeri::all(),
        ];
        return view('portal.admin.data-galeri-page', $data);
    }

    

    public function store(Request $request)
    {
        // dd($request->all());
       try {
        $request->validate([
            'url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_upload' => 'required',
        ]);

        // proses gambar
        $gambar = $request->file('url');
        $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/assets/img/galeri'), $nama_gambar);

        // simpan ke db
        $galeri = new Galeri;
        
        $galeri->url = $nama_gambar; 
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->tanggal_upload = $request->tanggal_upload;

        // dd($galeri); 
    // Save  ke database
    $galeri->save();

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
            'url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_upload' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('url')) {
            // Hapus gambar lama jika ada
            if ($galeri->url && file_exists(base_path('public/assets/img/galeri/' . $galeri->url))) {
                unlink(base_path('public/assets/img/galeri/' . $galeri->url));
            }

            // Simpan gambar baru
            $gambar = $request->file('url');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/galeri'), $nama_gambar);
            $galeri->url = $nama_gambar;
        }

        // Perbarui data lainnya
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->tanggal_upload = $request->tanggal_upload;
        // dd($galeri);
        $galeri->save();

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
        $galeri = Galeri::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($galeri->url) {
            $gambarPath = public_path('assets/img/galeri/' . $galeri->url);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus record dari database
        $galeri->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
