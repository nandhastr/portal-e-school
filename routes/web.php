<?php


use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\GuruController;
// use App\Http\Controllers\KelasController;
// use App\Http\Controllers\MapelController;
// use App\Http\Controllers\SiswaController;
// use App\Http\Controllers\CrudKelasController;
// use App\Http\Controllers\CrudSiswaController;
// use App\Http\Controllers\ElearningController;
// use App\Http\Controllers\CrudRuanganController;
// use App\Http\Controllers\CrudPenghargaanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\portalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CrudPortal\GuruCrudController;
use App\Http\Controllers\CrudPortal\SiswaCrudController;
use App\Http\Controllers\CrudPortal\AlumniCrudController;
use App\Http\Controllers\CrudPortal\GaleriCrudController;
use App\Http\Controllers\CrudPortal\ArtikelCrudController;
use App\Http\Controllers\CrudPortal\CrudStrukturController;
use App\Http\Controllers\CrudPortal\KaryawanCrudController;
use App\Http\Controllers\CrudPortal\KomponenCrudController;
use App\Http\Controllers\CrudPortal\PrestasiCrudController;
use App\Http\Controllers\CrudPortal\VisimisiCrudController;
use App\Http\Controllers\CrudPortal\CrudPengumumanController;
use App\Http\Controllers\CrudPortal\CrudProfileSekolahController;
use App\Http\Controllers\CrudPortal\KegiatanCrudController;
use App\Http\Controllers\CrudPortal\EventController;
use App\Http\Controllers\CrudPortal\SliderCrudController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route view portal
Route::get('/', [portalController::class, 'index'])->name('/');
Route::get('/siswa', [portalController::class, 'siswa'])->name('siswa');
Route::get('/album', [portalController::class, 'album'])->name('album');
Route::get('/alumni', [portalController::class, 'alumni'])->name('alumni');
Route::get('/berita', [portalController::class, 'berita'])->name('berita');
Route::get('/about', [portalController::class, 'about'])->name('about');
Route::get('/visi', [portalController::class, 'visi'])->name('visi');
Route::get('/struktur-organisasi', [portalController::class, 'struktur_organisasi'])->name('struktur-organisasi');
Route::get('/tendik', [portalController::class, 'tendik'])->name('tendik');
Route::get('/program', [portalController::class, 'program'])->name('program');
Route::get('/program', [portalController::class, 'program'])->name('program');
Route::get('/article-berjualan', [portalController::class, 'article_berjualan'])->name('article-berjualan');
Route::get('/article-marketing', [portalController::class, 'article_marketing'])->name('article-marketing');
Route::get('/article-bisnis', [portalController::class, 'article_bisnis'])->name('article-bisnis');
Route::get('keg-osis', [portalController::class, 'keg_osis'])->name('keg-osis');
Route::get('keg-pramuka', [portalController::class, 'keg_pramuka'])->name('keg-pramuka');

// Route::middleware(['auth','AdminMiddleware'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index']);
//     // Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
// });

// filter alumni berdasarkan tahun
Route::post('/filter-data-alumni/{year}', [AlumniCrudController::class, 'filterByYear'])->name('filter-data-alumni');


// Semua route di dalam group ini hanya bisa diakses oleh user dengan role admin
Route::middleware(['auth', 'Admin'])->group(function () {

    // crud user
    Route::get('/data-user', [UserController::class, 'index'])->name('data-user');
    Route::post('/data-user-store', [UserController::class, 'store'])->name('data-user-store');
    Route::post('/data-user-update/{id}', [UserController::class, 'update'])->name('data-user-update');
    Route::post('/data-user-delete/{id}', [UserController::class, 'destroy'])->name('data-user-delete');


    // crud profile sekolah
    Route::get('/data-profil-sekolah', [CrudProfileSekolahController::class, 'index'])->name('data-profil-sekolah');
    Route::post('/data-profil-store', [CrudProfileSekolahController::class, 'store'])->name('data-profil-store');
    Route::post('/data-profil-update/{id}', [CrudProfileSekolahController::class, 'update'])->name('data-profil-update');
    Route::post('/data-profil-delete/{id}', [CrudProfileSekolahController::class, 'destroy'])->name('data-profil-delete');
    
    // crud pengumuman
    Route::get('/data-pengumuman', [CrudPengumumanController::class, 'index'])->name('data-pengumuman');
    Route::get('/detail-pengumuman/{id}', [CrudPengumumanController::class, 'detail'])->name('detail-pengumuman');
    Route::post('/data-pengumuman-store', [CrudPengumumanController::class, 'store'])->name('data-pengumuman-store');
    Route::post('/data-pengumuman-update/{id}', [CrudPengumumanController::class, 'update'])->name('data-pengumuman-update');
    Route::post('/data-pengumuman-delete/{id}', [CrudPengumumanController::class, 'destroy'])->name('data-pengumuman-delete');

    // crud artikel
    Route::get('/data-artikel', [ArtikelCrudController::class, 'index'])->name('data-artikel');
    Route::post('/data-artikel-store', [ArtikelCrudController::class, 'store'])->name('data-artikel-store');
    Route::post('/data-artikel-update/{id}', [ArtikelCrudController::class, 'update'])->name('data-artikel-update');
    Route::post('/data-artikel-delete/{id}', [ArtikelCrudController::class, 'destroy'])->name('data-artikel-delete');

    // crud gambar slider
    Route::get('/data-slider', [SliderCrudController::class, 'index'])->name('data-slider');
    Route::post('/data-slider-store', [SliderCrudController::class, 'store'])->name('data-slider-store');
    Route::post('/data-slider-update/{id}', [SliderCrudController::class, 'update'])->name('data-slider-update');
    Route::post('/data-slider-delete/{id}', [SliderCrudController::class, 'destroy'])->name('data-slider-delete');

    // crud data siswa
    Route::get('/data-siswa', [SiswaCrudController::class, 'index'])->name('data-siswa');
    Route::post('/data-siswa-store', [SiswaCrudController::class, 'store'])->name('data-siswa-store');
    Route::post('/data-siswa-update/{id}', [SiswaCrudController::class, 'update'])->name('data-siswa-update');
    Route::post('/data-siswa-delete/{id}', [SiswaCrudController::class, 'destroy'])->name('data-siswa-delete');

    // crud guru
    Route::get('/data-guru', [GuruCrudController::class, 'index'])->name('data-guru');
    Route::post('/data-guru-store', [GuruCrudController::class, 'store'])->name('data-guru-store');
    Route::post('/data-guru-update/{id}', [GuruCrudController::class, 'update'])->name('data-guru-update');
    Route::post('/data-guru-delete/{id}', [GuruCrudController::class, 'destroy'])->name('data-guru-delete');


    // crud alumni
    Route::get('/data-alumni', [AlumniCrudController::class, 'index'])->name('data-alumni');
    Route::get('/filter-alumni', [AlumniCrudController::class, 'filterAlumni'])->name('filter-alumni');
    Route::post('/data-alumni-store', [AlumniCrudController::class, 'store'])->name('data-alumni-store');
    Route::post('/data-alumni-update/{id}', [AlumniCrudController::class, 'update'])->name('data-alumni-update');
    Route::post('/data-alumni-delete/{id}', [AlumniCrudController::class, 'destroy'])->name('data-alumni-delete');


    // crud karyawan
    Route::get('/data-karyawan', [KaryawanCrudController::class, 'index'])->name('data-karyawan');
    Route::post('/data-karyawan-store', [KaryawanCrudController::class, 'store'])->name('data-karyawan-store');
    Route::post('/data-karyawan-update/{id}', [KaryawanCrudController::class, 'update'])->name('data-karyawan-update');
    Route::post('/data-karyawan-delete/{id}', [KaryawanCrudController::class, 'destroy'])->name('data-karyawan-delete');
    // crud visi misi
    Route::get('/data-visimisi', [VisimisiCrudController::class, 'index'])->name('data-visimisi');
    Route::post('/data-visimisi-store', [VisimisiCrudController::class, 'store'])->name('data-visimisi-store');
    Route::post('/data-visimisi-update/{id}', [VisimisiCrudController::class, 'update'])->name('data-visimisi-update');
    Route::post('/data-visimisi-delete/{id}', [VisimisiCrudController::class, 'destroy'])->name('data-visimisi-delete');
    // crud Galeri
    Route::get('/data-galeri', [GaleriCrudController::class, 'index'])->name('data-galeri');
    Route::post('/data-galeri-store', [GaleriCrudController::class, 'store'])->name('data-galeri-store');
    Route::post('/data-galeri-update/{id}', [GaleriCrudController::class, 'update'])->name('data-galeri-update');
    Route::post('/data-galeri-delete/{id}', [GaleriCrudController::class, 'destroy'])->name('data-galeri-delete');
    // crud prestasi
    Route::get('/data-prestasi', [PrestasiCrudController::class, 'index'])->name('data-prestasi');
    Route::post('/data-prestasi-store', [PrestasiCrudController::class, 'store'])->name('data-prestasi-store');
    Route::post('/data-prestasi-update/{id}', [PrestasiCrudController::class, 'update'])->name('data-prestasi-update');
    Route::post('/data-prestasi-delete/{id}', [PrestasiCrudController::class, 'destroy'])->name('data-prestasi-delete');
    // crud organingram
    Route::get('/data-struktur', [CrudStrukturController::class, 'index'])->name('data-struktur');
    Route::post('/data-struktur-store', [CrudStrukturController::class, 'store'])->name('data-struktur-store');
    Route::post('/data-struktur-update/{id}', [CrudStrukturController::class, 'update'])->name('data-struktur-update');
    Route::post('/data-struktur-delete/{id}', [CrudStrukturController::class, 'destroy'])->name('data-struktur-delete');

    Route::get('/get-guru/{id}', [CrudStrukturController::class, 'getGuruById'])->name('get-guru');
    // crud komponen Sekolah
    Route::get('/data-komponenSekolah', [KomponenCrudController::class, 'index'])->name('data-komponenSekolah');
    Route::post('/data-komponenSekolah-store', [KomponenCrudController::class, 'store'])->name('data-komponenSekolah-store');
    Route::post('/data-komponenSekolah-update/{id}', [KomponenCrudController::class, 'update'])->name('data-komponenSekolah-update');
    Route::post('/data-komponenSekolah-delete/{id}', [KomponenCrudController::class, 'destroy'])->name('data-komponenSekolah-delete');

    // crud event kelender
    Route::get('/data-event', [EventController::class, 'index'])->name('data-event');
    Route::post('/data-event-store', [EventController::class, 'store'])->name('data-event-store');
    Route::post('/data-event-update/{id}', [EventController::class, 'update'])->name('data-event-update');
    Route::post('/data-event-delete/{id}', [EventController::class, 'destroy'])->name('data-event-delete');
});

Route::middleware(['auth', 'Admin-Osis'])->group(function () {
    // Semua route di dalam group ini hanya bisa diakses oleh user dengan role 'osis' dan admin
    //portal  dashboardadmin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');

    Route::get('/data-kegiatan', [KegiatanCrudController::class, 'index'])->name('data-kegiatan');
    Route::get('/detail-kegiatan/{id}', [KegiatanCrudController::class, 'detail'])->name('detail-kegiatan');
    Route::post('/data-kegiatan-store', [KegiatanCrudController::class, 'store'])->name('data-kegiatan-store');
    Route::post('/data-kegiatan-update/{id}', [KegiatanCrudController::class, 'update'])->name('data-kegiatan-update');
    Route::post('/data-kegiatan-delete/{id}', [KegiatanCrudController::class, 'destroy'])->name('data-kegiatan-delete');
});

require __DIR__ . '/auth.php';
