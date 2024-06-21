<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class SiswaCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Siswa',
            'user'=> $user,
            'siswa' => Siswa::all(),
        ];
        return view('portal.admin.data-siswa-page', $data);
    }

    

    public function store(Request $request)
    {
        // dd($request->all());
       try {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        // proses gambar
        $gambar = $request->file('gambar');
        $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/assets/img/siswa'), $nama_gambar);

        // simpan ke db
        $siswa = new Siswa;
        
        $siswa->gambar = $nama_gambar; 
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;

        // dd($siswa); 
    // Save  ke database
    $siswa->save();

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
             'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($siswa->gambar && file_exists(base_path('public/assets/img/siswa/' . $siswa->gambar))) {
                unlink(base_path('public/assets/img/siswa/' . $siswa->gambar));
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/siswa'), $nama_gambar);
            $siswa->gambar = $nama_gambar;
        }

        // Perbarui data lainnya
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;

        $siswa->save();

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
        $siswa = Siswa::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($siswa->gambar) {
            $gambarPath = public_path('assets/img/siswa/' . $siswa->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus record dari database
        $siswa->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
