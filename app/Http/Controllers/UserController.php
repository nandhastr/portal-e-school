<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PortalModel\Komponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = [
            'komponen'=>Komponen::all(),
            'title' => 'Halaman Data user',
            'user' => $user,
            'level' => User::all(),
        ];
        return view('portal.admin.data-user-page', $data);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                 'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'password' => 'required',
            ]);
            // simpan ke db
            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);

            // dd($user); 
            // Save  ke database
            $user->save();

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
                'name' => 'required',
                'email' => 'nullable|email',
                'role' => 'required',
                'password' => 'nullable',
            ]);

            // Temukan record berdasarkan ID
            $user = User::findOrFail($id);
            // Perbarui data lainnya
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
           
            // dd($user);
             // update password 
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

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
            $user = User::findOrFail($id);
            // Hapus record dari database
            $user->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        };
    }
}
