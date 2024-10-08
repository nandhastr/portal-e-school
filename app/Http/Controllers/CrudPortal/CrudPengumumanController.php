<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Pengumuman;
use App\Models\PortalModel\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Data Pengumuman',
            'user'=> $user,
            'pengumuman' => Pengumuman::all(),
        ];
        return view('portal.admin.data-pengumuman-page', $data);
    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,doc,docx,xls,xlsx|max:512',
            'judul' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required',
        ]);

        // proses gambar
        $gambar = $request->file('gambar');
        $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/assets/img/pengumuman'), $nama_gambar);

        // simpan ke db
        $pengumuman = new Pengumuman;
        
        $pengumuman->gambar = $nama_gambar; 
        $pengumuman->judul = $request->judul;
        $pengumuman->keterangan = $request->keterangan;
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->tempat = $request->tempat;
        $pengumuman->waktu = $request->waktu;
        $pengumuman->save();
        
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:512',
            'judul' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $pengumuman = Pengumuman::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($pengumuman->gambar && file_exists(base_path('public/assets/img/pengumuman/' . $pengumuman->gambar))) {
                unlink(base_path('public/assets/img/pengumuman/' . $pengumuman->gambar));
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/pengumuman'), $nama_gambar);
            $pengumuman->gambar = $nama_gambar;
        }

        // Perbarui data lainnya
        $pengumuman->judul = $request->judul;
        $pengumuman->keterangan = $request->keterangan;
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->tempat = $request->tempat;
        $pengumuman->waktu = $request->waktu;

        $pengumuman->save();

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
        $pengumuman = pengumuman::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($pengumuman->gambar) {
            $gambarPath = public_path('assets/img/pengumuman/' . $pengumuman->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus record dari database
        $pengumuman->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
