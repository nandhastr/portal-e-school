<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Struktur_org;
use App\Models\PortalModel\komponen;
use App\Models\PortalModel\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CrudStrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
         $struktur = Struktur_org::with('guru')->get();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Data Struktur Organisasi',
            'user'=> $user,
            'struktur' => $struktur,
            'guru'=> Guru::all()
        ];
        return view('portal.admin.data-struktur-page', $data);
    }

    

    public function store(Request $request)
    {
        // dd($request->all());
       try {
        $request->validate([
            'id_guru' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);
        // simpan ke db
        $struktur = new Struktur_org;
        
        $struktur->id_guru = $request->id_guru;
        $struktur->jabatan = $request->jabatan;
        $struktur->email = $request->email;
        $struktur->telepon = $request->telepon;

        // dd($struktur); 
    // Save  ke database
    $struktur->save();

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
            'id_guru' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $struktur = Struktur_org::findOrFail($id);

        // Perbarui data lainnya
         $struktur->id_guru = $request->id_guru;
        $struktur->jabatan = $request->jabatan;
        $struktur->email = $request->email;
        $struktur->telepon = $request->telepon;
        // dd($struktur);
        $struktur->save();

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
       $struktur = Struktur_org::findOrFail($id);

        // Hapus record dari database
       $struktur->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
