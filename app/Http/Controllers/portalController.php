<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class portalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('home-page',[
            'ttile' => 'Home'
        ]);
    }

    public function album() {
        return view ('album-page',[
            'title'=>'album'
        ]);
        
    }
    public function alumni(){
        return view ('data-alumni-page',[
            'title'=>'Data alumni'
        ]);
    }
    public function berita(){
        return view('berita-page',[
            'title'=>'Data Berita'
        ]);
    }
    public function sejarah(){
        return view ('sejarah-page',[
            'title'=>'Halaman Sejarah'
        ]);
    }
public function visi(){
    return view('visi-page',[
        'title'=>'Halaman sejarah'
    ]);
}
public function struktur_organisasi(){
        return view('struktur-organisasi-page', [
            'title' => 'Halaman struktur organisasi'
        ]);
}
public function tendik(){
    return view('tendik-page',[
        'title'=>'halaman tenaga pendidik'
    ]);
}
public function program(){
        return view('program-page', [
            'title' => 'halaman program sekolah'
        ]);
}

public function article_berjualan(){
        return view('article-berjualan-page', [
            'title' => 'Article berjualan'
        ]);
}
public function article_marketing(){
        return view('article-marketing-page', [
            'title' => 'Article marketing'
        ]);
}
public function article_bisnis(){
        return view('article-bisnis-page', [
            'title' => 'Article bisnis'
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
