<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\VisiMisi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisimisiCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Visi Dan Misi',
            'user'=> $user,
            'visi' => VisiMisi::all(),
        ];
        return view('portal.admin.data-visimisi-page', $data);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'kategori' => 'required',
            'konten' => 'required|string',
        ]);


        // simpan ke db
        $visi = new VisiMisi;
        
        $visi->kategori = $request->kategori;
        $visi->konten = $request->konten;

        // dd($visi); 

        $visi->save();
        
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
    }
    }



    // metod update
    public function update(Request $request, string $id)
    {
        try{
        //  dd($request->all());
        $request->validate([
            'kategori' => 'required',
            'konten' => 'required|string',
        ]);

        // Temukan record berdasarkan ID
        $visi = VisiMisi::findOrFail($id);

        // Perbarui data lainnya
       
        $visi->kategori = $request->kategori;
        $visi->konten = $request->konten;

        $visi->save();

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
  
        try{
        // Temukan record berdasarkan ID
        $visi = VisiMisi::findOrFail($id);

        // Hapus record dari database
        $visi->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    
}
}
