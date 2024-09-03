<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class CrudSiswaController extends Controller
{
    /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        // Ambil dan tampilkan data
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     */
    public function create()
    {
        // Tampilkan form untuk membuat siswa baru
    }

    /**
     * Menyimpan resource baru ke dalam storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:512',
            'nisn' => 'required|unique:tbl_siswa,nisn',
            'id_kelas' => 'required',
            'name' => 'required',
            'angkatan' => 'required|numeric',
            'status' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama_ibu' => 'required',
            'tahun_masuk' => 'required|numeric|min:1900|max:' . date('Y'),
            'sekolah_sebelumnya' => 'required',
            'alamat' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
        ]);
        // dd($request->all());
        $foto = $request->file('foto');
        $nama_foto = date("YmdHis")  . '-' . $foto->getClientOriginalName();
        $foto->move(base_path('public/assets/img/user'), $nama_foto);


        // Simpan data ke tabel user
        $user  = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        $user->save();

        // Simpan data ke tabel siswa
        $siswa = new  Siswa;
        $siswa->nisn = $request->nisn;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->angkatan = $request->angkatan;
        $siswa->status = $request->status;
        $siswa->gender = $request->gender;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->nam_ibu = $request->nam_ibu;
        $siswa->tahun_masuk = $request->tahun_masuk;
        $siswa->sekolah_sebelumnya = $request->sekolah_sebelumnya;
        $siswa->alamat = $request->alamat;
        $siswa->phone = $request->phone;
        $siswa->foto = $nama_foto;

        $siswa->save();



        return redirect()->route('data-siswa-page')->with('success', 'Data siswa berhasil ditambahkan.');
    }



    /**
     * Menampilkan resource yang ditentukan.
     */
    public function show($id)
    {
        // Tampilkan data siswa tertentu
    }

    /**
     * Menampilkan form untuk mengedit resource yang ditentukan.
     */
    public function edit($id)
    {
        // Tampilkan form untuk mengedit data siswa
    }

    /**
     * Memperbarui resource yang ditentukan di storage.
     */
    public function update(Request $request, $id)
    {
        // Update data siswa
    }

    /**
     * Menghapus resource yang ditentukan dari storage.
     */
    public function destroy($id)
    {
        // Hapus data siswa
    }
}
