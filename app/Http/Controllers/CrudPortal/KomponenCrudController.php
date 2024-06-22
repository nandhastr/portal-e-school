<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class KomponenCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'title' => 'Halaman Data komponen',
            'user'=> $user,
            'komponen' => Komponen::all(),
        ];
        return view('portal.admin.data-komponen-page', $data);
    }

    

    public function store(Request $request)
    {
        // dd($request->all());
       try {
        $request->validate([
            'gambar_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instansi' => 'required',
            'akreditas' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'link_fb' => 'nullable',
            'link_ig' => 'nullable',
            'link_yt' => 'nullable',
            'link_tw' => 'nullable',
        ]);

        // proses gambar
        $gambar = $request->file('gambar_logo');
        $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/assets/img/komponen'), $nama_gambar);

        // simpan ke db
        $komponen = new Komponen;
        
        $komponen->gambar_logo = $nama_gambar; 
        $komponen->instansi = $request->instansi;
        $komponen->akreditas = $request->akreditas;
        $komponen->alamat = $request->alamat;
        $komponen->telepon = $request->telepon;
        $komponen->email = $request->email;
        $komponen->link_fb = $request->link_fb;
        $komponen->link_ig = $request->link_ig;
        $komponen->link_yt = $request->link_yt;
        $komponen->link_tw = $request->link_tw;

        // dd($komponen); 
    // Save  ke database
    $komponen->save();

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
            'gambar_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'instansi' => 'required',
            'akreditas' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'link_fb' => 'required',
            'link_ig' => 'required',
            'link_yt' => 'required',
            'link_tw' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $komponen = Komponen::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('gambar_logo')) {
            // Hapus gambar lama jika ada
            if ($komponen->gambar_logo && file_exists(base_path('public/assets/img/komponen/' . $komponen->gambar_logo))) {
                unlink(base_path('public/assets/img/komponen/' . $komponen->gambar_logo));
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar_logo');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/komponen'), $nama_gambar);
            $komponen->gambar_logo = $nama_gambar;
        }

        // Perbarui data lainnya
        $komponen->instansi = $request->instansi;
        $komponen->akreditas = $request->akreditas;
        $komponen->alamat = $request->alamat;
        $komponen->telepon = $request->telepon;
        $komponen->email = $request->email;
        $komponen->link_fb = $request->link_fb;
        $komponen->link_ig = $request->link_ig;
        $komponen->link_yt = $request->link_yt;
        $komponen->link_tw = $request->link_tw;

        $komponen->save();

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
        $komponen = komponen::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($komponen->gambar_logo) {
            $gambarPath = public_path('assets/img/komponen/' . $komponen->gambar_logo);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }
        // Hapus record dari database
        $komponen->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
