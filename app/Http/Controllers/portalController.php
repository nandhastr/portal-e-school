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
        return view('portal.home-page', [
            'ttile' => 'Home'
        ]);
    }
    public function siswa()
    {
        return view('portal.siswa-page', [
            'ttile' => 'Siswa'
        ]);
    }

    public function album()
    {
        return view('portal.album-page', [
            'title' => 'album'
        ]);
    }
    public function alumni()
    {
        return view('portal.data-alumni-page', [
            'title' => 'Data alumni'
        ]);
    }
    public function berita()
    {
        return view('portal.berita-page', [
            'title' => 'Data Berita'
        ]);
    }
    public function sejarah()
    {
        return view('portal.sejarah-page', [
            'title' => 'Halaman Sejarah'
        ]);
    }
    public function visi()
    {
        return view('portal.visi-page', [
            'title' => 'Halaman sejarah'
        ]);
    }
    public function struktur_organisasi()
    {
        return view('portal.struktur-organisasi-page', [
            'title' => 'Halaman struktur organisasi'
        ]);
    }
    public function tendik()
    {
        return view('portal.tendik-page', [
            'title' => 'halaman tenaga pendidik'
        ]);
    }
    public function program()
    {
        return view('portal.program-page', [
            'title' => 'halaman program sekolah'
        ]);
    }

    public function article_berjualan()
    {
        return view('portal.article-berjualan-page', [
            'title' => 'Article berjualan'
        ]);
    }
    public function article_marketing()
    {
        return view('portal.article-marketing-page', [
            'title' => 'Article marketing'
        ]);
    }
    public function article_bisnis()
    {
        return view('portal.article-bisnis-page', [
            'title' => 'Article bisnis'
        ]);
    }

    public function keg_uks()
    {
        $data =
            [
                'title' => 'Kegiatan Unit Kegiatan Sekolah'
            ];
        return view('portal.keg-uks-page', $data);
    }
    public function keg_osis()
    {
        $data =
            [
                'title' => 'Kegiatan OSIS'
            ];
        return view('portal.keg-osis-page', $data);
    }
    public function keg_pramuka()
    {
        $data =
            [
                'title' => 'Kegiatan Pramuka'
            ];
        return view('portal.keg-pramuka-page', $data);
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
