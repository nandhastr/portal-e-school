<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\awards;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElearningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('elearning.dashboard-page', [
            'user' => Auth::user(),
            'awards' => Ujian::all(),
            'title' => 'Dashboard',
            'name' => 'nanda'
        ]);
    }

    public function all_class()
    {
        return view('elearning.all-class-page', [
            'title' => 'Semua Kelas'
        ]);
    }
    public function uts()
    {
        return view('elearning.ujian-page', [
            'title' => 'Halaman Ujian Tengah Semester'
        ]);
    }
    public function uas()
    {
        return view('elearning.ujian-page', [
            'title' => 'Halaman Ujian Akhir Semester'
        ]);
    }
    public function un()
    {
        return view('elearning.ujian-page', [
            'title' => 'Halaman Ujian Nasional'
        ]);
    }
    public function profile_class()
    {
        return view('elearning.profile-class-page', [
            'title' => 'Profile Kelas'
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
