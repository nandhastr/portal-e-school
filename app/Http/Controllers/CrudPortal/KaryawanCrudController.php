<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Karyawan;
use App\Models\PortalModel\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class KaryawanCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Data karyawan',
            'user'=> $user,
            'karyawan' => Karyawan::all(),
        ];
        return view('portal.admin.data-karyawan-page', $data);
    }

    

    public function store(Request $request)
    {
        // dd($request->all());
       try {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:512',
            'nip' => 'required',
                'nama' => 'required',
                'jabatan' => 'required',
                'status' => 'required',
                'genre' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'email' => 'required',
                'telepon' => 'required',
            
        ]);

        // proses gambar
        $gambar = $request->file('gambar');
        $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/assets/img/karyawan'), $nama_gambar);

        // simpan ke db
        $karyawan = new Karyawan;
        
        $karyawan->gambar = $nama_gambar; 
         $karyawan->nip = $request->nip;
            $karyawan->nama = $request->nama;
            $karyawan->jabatan = $request->jabatan;
            $karyawan->status = $request->status;
            $karyawan->genre = $request->genre;
            $karyawan->tempat_lahir = $request->tempat_lahir;
            $karyawan->tanggal_lahir = $request->tanggal_lahir;
            $karyawan->email = $request->email;
            $karyawan->telepon = $request->telepon;

        // dd($karyawan); 
    // Save  ke database
    $karyawan->save();

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
             'nip' => 'required',
                'nama' => 'required',
                'jabatan' => 'required',
                'status' => 'required',
                'genre' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'email' => 'required',
                'telepon' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $karyawan = Karyawan::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($karyawan->gambar && file_exists(base_path('public/assets/img/karyawan/' . $karyawan->gambar))) {
                unlink(base_path('public/assets/img/karyawan/' . $karyawan->gambar));
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/karyawan'), $nama_gambar);
            $karyawan->gambar = $nama_gambar;
        }

        // Perbarui data lainnya
        $karyawan->nip = $request->nip;
            $karyawan->nama = $request->nama;
            $karyawan->jabatan = $request->jabatan;
            $karyawan->status = $request->status;
            $karyawan->genre = $request->genre;
            $karyawan->tempat_lahir = $request->tempat_lahir;
            $karyawan->tanggal_lahir = $request->tanggal_lahir;
            $karyawan->email = $request->email;
            $karyawan->telepon = $request->telepon;

        $karyawan->save();

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
        $karyawan = Karyawan::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($karyawan->gambar) {
            $gambarPath = public_path('assets/img/karyawan/' . $karyawan->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus record dari database
        $karyawan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
