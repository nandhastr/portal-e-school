<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\SiswaBerprestasi;
use App\Models\PortalModel\Siswa;
use App\Models\PortalModel\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PrestasiCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
         $prestasi = SiswaBerprestasi::with('siswa')->get();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Data Siswa Berprestasi',
            'user'=> $user,
            'siswa'=> Siswa::all(),
            'prestasi' => $prestasi,
        ];
        return view('portal.admin.data-prestasi-page', $data);
    }

    

    public function store(Request $request)
    {
        // dd($request->all());
       try {
        $request->validate([
            'prestasi' => 'required',
            'tahun' => 'required',
            'siswa_id' => 'required',
        ]);
        // simpan ke db
        $prestasi = new SiswaBerprestasi;
        
        $prestasi->prestasi = $request->prestasi;
        $prestasi->siswa_id = $request->siswa_id;
        $prestasi->tahun = $request->tahun;

        // dd($prestasi); 
    // Save  ke database
    $prestasi->save();

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
            'prestasi' => 'required',
            'tahun' => 'required',
            'siswa_id' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $prestasi = SiswaBerprestasi::findOrFail($id);

        // Perbarui data lainnya
         $prestasi->prestasi = $request->prestasi;
        $prestasi->siswa_id = $request->siswa_id;
        $prestasi->tahun = $request->tahun;

        $prestasi->save();

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
       $prestasi = SiswaBerprestasi::findOrFail($id);
        // Hapus record dari database
        $prestasi->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
