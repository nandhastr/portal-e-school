<?php

namespace App\Http\Controllers\CrudPortal;

use App\Models\PortalModel\Guru;
use App\Models\PortalModel\Komponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class GuruCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = [
            'komponen' => Komponen::all(),
            'title' => 'Halaman Data Guru',
            'user' => $user,
            'guru' => Guru::all(),
        ];
        return view('portal.admin.data-guru-page', $data);
    }



    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nip' => 'required',
                'nama' => 'required',
                'jabatan' => 'required',
                'status' => 'required',
                'genre' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'email' => 'required|email',
                'telepon' => 'required',
            ]);

            // proses gambar
            $gambar = $request->file('gambar');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/assets/img/guru'), $nama_gambar);

            // simpan ke db
            $guru = new Guru;

            $guru->gambar = $nama_gambar;
            $guru->nip = $request->nip;
            $guru->nama = $request->nama;
            $guru->jabatan = $request->jabatan;
            $guru->status = $request->status;
            $guru->genre = $request->genre;
            $guru->tempat_lahir = $request->tempat_lahir;
            $guru->tanggal_lahir = $request->tanggal_lahir;
            $guru->email = $request->email;
            $guru->telepon = $request->telepon;

            // dd($guru);
            // Save  ke database
            $guru->save();

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
            $guru = Guru::findOrFail($id);

            // Periksa apakah file gambar ada dalam request
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($guru->gambar && file_exists(base_path('public/assets/img/guru/' . $guru->gambar))) {
                    unlink(base_path('public/assets/img/guru/' . $guru->gambar));
                }

                // Simpan gambar baru
                $gambar = $request->file('gambar');
                $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
                $gambar->move(base_path('public/assets/img/guru'), $nama_gambar);
                $guru->gambar = $nama_gambar;
            }

            // Perbarui data lainnya
            $guru->nip = $request->nip;
            $guru->nama = $request->nama;
            $guru->jabatan = $request->jabatan;
            $guru->status = $request->status;
            $guru->genre = $request->genre;
            $guru->tempat_lahir = $request->tempat_lahir;
            $guru->tanggal_lahir = $request->tanggal_lahir;
            $guru->email = $request->email;
            $guru->telepon = $request->telepon;
            $guru->save();

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
            $guru = Guru::findOrFail($id);

            // Hapus gambar dari storage jika ada
            if ($guru->gambar) {
                $gambarPath = public_path('assets/img/guru/' . $guru->gambar);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }

            // Hapus record dari database
            $guru->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        };
    }
}
