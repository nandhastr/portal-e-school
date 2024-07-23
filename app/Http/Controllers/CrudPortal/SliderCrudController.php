<?php

namespace App\Http\Controllers\CrudPortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PortalModel\Komponen;
use App\Models\PortalModel\Gambar_slide;

class SliderCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'title' => 'Halaman Data Gambar Slider',
            'slideImage'=> Gambar_slide::all(),
            'komponen'=>Komponen::all(),
            'user'=> $user,
        ];
        return view('portal.admin.data-slideImage-page', $data);
    
    }
    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        try {
            // Validasi gambar
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Proses gambar
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/img/gambarSlide'), $nama_gambar);

            // Simpan ke database
            $gambarSlide = new Gambar_slide;
            $gambarSlide->gambar = $nama_gambar;
            $gambarSlide->save();

            return redirect()->back()->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

// public function update(Request $request, string $id)
// {
//     try {
//         // Validasi gambar
//         $request->validate([
//             'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048'
//         ]);

//         // Temukan record berdasarkan ID
//         $gambarSlide = Gambar_slide::findOrFail($id);

//         // Periksa apakah file gambar ada dalam request
//         if ($request->hasFile('gambar')) {
//             // Hapus gambar lama jika ada
//             if ($gambarSlide->gambar && file_exists(public_path('assets/img/gambarSlide/' . $gambarSlide->gambar))) {
//                 unlink(public_path('assets/img/gambarSlide/' . $gambarSlide->gambar));
//             }

//             // Simpan gambar baru
//             $gambar = $request->file('gambar');
//             $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
//             $gambar->move(public_path('assets/img/gambarSlide'), $nama_gambar);
//             $gambarSlide->gambar = $nama_gambar;
//         }

//         // Simpan ke database
//         $gambarSlide->save();

//         return redirect()->back()->with('success', 'Data');
//     }
// }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, string $id)
    {
    //    dd($request->all());
      try {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        // Temukan record berdasarkan ID
        $img = Gambar_slide::findOrFail($id);

        // Periksa apakah file gambar ada dalam request
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($img->gambar && file_exists(base_path('public/assets/img/gambarSlide/' . $img->gambar))) {
                unlink(base_path('public/assets/img/gambarSlide/' . $img->gambar));
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/gambarSlide'), $nama_gambar);
            $img->gambar = $nama_gambar;
        }

        // dd($img);
        // save ke db
        $img->save();

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
        $gambar = Gambar_slide::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($gambar->gambar) {
            $gambarPath = public_path('assets/img/gambarSlide/' . $gambar->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus record dari database
        $gambar->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
