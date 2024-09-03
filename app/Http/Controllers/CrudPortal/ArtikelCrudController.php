<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Artikel;
use App\Models\PortalModel\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtikelCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Data artikel',
            'user' => $user,
            'artikel' => Artikel::all(),
        ];
        return view('portal.admin.data-artikel-page', $data);
    }



    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:512',
                'judul' => 'required',
                'jenis' => 'required',
                'isi' => 'required',
                'tanggal' => 'required',
            ]);

            // proses gambar
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/artikel'), $nama_gambar);

            // simpan ke db
            $artikel = new Artikel();

            $artikel->gambar = $nama_gambar;
            $artikel->judul = $request->judul;
            $artikel->jenis = $request->jenis;
            $artikel->isi = $request->isi;
            $artikel->tanggal = $request->tanggal;

            // dd($artikel); 
            // Save  ke database
            $artikel->save();

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
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:512',
                'judul' => 'required',
                'jenis' => 'required',
                'isi' => 'required',
                'tanggal' => 'required',
            ]);

            // Temukan record berdasarkan ID
            $artikel = Artikel::findOrFail($id);

            // Periksa apakah file gambar ada dalam request
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($artikel->gambar && file_exists(base_path('public/assets/img/artikel/' . $artikel->gambar))) {
                    unlink(base_path('public/assets/img/artikel/' . $artikel->gambar));
                }

                // Simpan gambar baru
                $gambar = $request->file('gambar');
                $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
                $gambar->move(base_path('public/assets/img/artikel'), $nama_gambar);
                $artikel->gambar = $nama_gambar;
            }

            // Perbarui data lainnya
            $artikel->judul = $request->judul;
            $artikel->jenis = $request->jenis;
            $artikel->isi = $request->isi;
            $artikel->tanggal = $request->tanggal;
            // dd($artikel);
            $artikel->save();

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
            $artikel = Artikel::findOrFail($id);

            // Hapus gambar dari storage jika ada
            if ($artikel->gambar) {
                $gambarPath = public_path('assets/img/artikel/' . $artikel->gambar);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }

            // Hapus record dari database
            $artikel->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        };
    }
}
