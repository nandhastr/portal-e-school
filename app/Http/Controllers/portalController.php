<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortalModel\Guru;

use App\Models\PortalModel\Komponen;
use App\Models\PortalModel\Karyawan;
use App\Models\PortalModel\Pengumuman;
use App\Models\PortalModel\Struktur_org;
use App\Models\PortalModel\ProfilSekolah;
use App\Models\PortalModel\SiswaBerprestasi;
use App\Models\PortalModel\VisiMisi;
use App\Models\PortalModel\Alumni;
use App\Models\PortalModel\Galeri;
use App\Models\PortalModel\Kegiatan;

class portalController extends Controller
{
    /**
     * Display a listing of the resource.
     
     
     */
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->take(4)->get();
        $guruKepsek = Guru::where('jabatan', 'Kepala Sekolah')->first();
        $data = [
            'title' => 'Home',
            'pengumuman_terbaru' => $pengumuman->first(),
            'pengumuman' => $pengumuman,
            'komponen' => Komponen::all(),
            'kepsek' => $guruKepsek,
        ];

        return view('portal.home-page', $data);
    }


    public function siswa()
    {
        $prestasi = SiswaBerprestasi::all();
        $data = [
            'title' => 'Siswa',
            'prestasi' => $prestasi,
            'komponen' => Komponen::all(),
        ];
        return view('portal.siswa-page', $data);
    }



    public function album()
    {
        $album = Galeri::all();
        $data = [
            'title' => 'album',
            'album'=>$album,
            'komponen' => Komponen::all(),
        ];
        return view('portal.album-page', $data);
    }


    public function alumni()
    {
        $countAlumni = Alumni::count();
        $data = [
            'countAlumni'=>$countAlumni,
            'alumni'=> Alumni::all(),
            'title' => 'Data alumni',
            'komponen' => Komponen::all(),
        ];
        return view('portal.data-alumni-page', $data);
    }
    // filter data alumni by tahun
    
    public function filterByYear($year)
    {
        $filterAlumni = Alumni::where('tahun_lulus', $year)->get();
        $countAlumni = Alumni::count();
        $data = [
            'countAlumni'=>$countAlumni,
            'filterAlumni' =>$filterAlumni,
        ];
        return view('portal.admin.data-alumni-page',$data);
    }


    public function berita()
    {
        $data = [
            'title' => 'Data Berita',
            'komponen' => Komponen::all(),
        ];
        return view('portal.berita-page', $data);
    }


    public function about()
    {
        $guruKepsek = Guru::where('jabatan', 'Kepala Sekolah')->first();
        $about = ProfilSekolah::orderBy('created_at', 'asc')->where('kategori', 'tentang_sekolah')->get();
        $data = [
            'about' => $about->first(),
            'title' => 'Halaman About',
            'komponen' => Komponen::all(),
        ];
        return view('portal.about-page', $data);
    }


    public function program()
    {
        $program = ProfilSekolah::orderBy('created_at', 'asc')->where('kategori', 'program_sekolah')->get();
        $data = [
            'title' => 'halaman program sekolah',
            'program' => $program->first(),
            'komponen' => Komponen::all(),
        ];
        return view('portal.program-page', $data);
    }

    public function visi()
    {
        $visi = VisiMisi::where('kategori', 'visi')->get();
        $misi = VisiMisi::where('kategori', 'misi')->get();
        $data = [
            'visi' => $visi,
            'misi' => $misi,
            'title' => 'Halaman visi misi',
            'komponen' => Komponen::all(),
        ];
        return view('portal.visi-page', $data);
    }


    public function struktur_organisasi()
    {
        $struktur = Struktur_org::orderBy('created_at', 'asc')->get();
        $data = [
            'title' => 'Halaman struktur organisasi',
            'struktur' => $struktur,
            'komponen' => Komponen::all(),
        ];
        return view('portal.struktur-organisasi-page', $data);
    }




    public function tendik()
    {
        $guru = Guru::all();
        $karyawan = Karyawan::all();
        $data = [
            'guru'=>$guru,
            'karyawan' =>$karyawan,
            'title' => 'halaman tenaga pendidik',
            'komponen' => Komponen::all(),
        ];
        return view('portal.tendik-page', $data);
    }





    public function article_berjualan()
    {
        $artikel_jualan = Artikel::where('jenis','artikel')->get();
        $data = [
            'title' => 'Article berjualan',
            'komponen' => Komponen::all(),
        ];
        return view('portal.article-berjualan-page', $data);
    }


    public function article_marketing()
    {
        $data = [
            'title' => 'Article marketing',
            'komponen' => Komponen::all(),
        ];
        return view('portal.article-marketing-page', $data);
    }


    public function article_bisnis()
    {
        $data = [
            'title' => 'Article bisnis',
            'komponen' => Komponen::all(),
        ];
        return view('portal.article-bisnis-page', $data);
    }


    public function keg_osis()
    {
         $osis = Kegiatan::orderBy('created_at', 'desc')->take(4)->where('kategori','osis')->get();
        $data = [
          
            'pengumuman_osis_terbaru' => $osis->first(),
            'osis' => $osis,
            'title' => 'Kegiatan OSIS',
            'komponen' => Komponen::all(),
        ];
        return view('portal.keg-osis-page', $data);
    }


    public function keg_pramuka()
    {
        $pramuka = Kegiatan::orderBy('created_at', 'desc')->take(4)->where('kategori','pramuka')->get();
        $data = [
          
            'pengumuman_pramuka_terbaru' => $pramuka->first(),
            'pramuka' => $pramuka,
            'title' => 'Kegiatan pramuka',
            'komponen' => Komponen::all(),
        ];
        return view('portal.keg-pramuka-page', $data);
    }
}
