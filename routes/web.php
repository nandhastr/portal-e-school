<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\portalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CrudKelasController;
use App\Http\Controllers\CrudSiswaController;
use App\Http\Controllers\ElearningController;
use App\Http\Controllers\CrudRuanganController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route view portal
Route::get('/', [portalController::class, 'index'])->name('/');
Route::get('/album', [portalController::class, 'album'])->name('album');
Route::get('/alumni', [portalController::class, 'alumni'])->name('alumni');
Route::get('/berita', [portalController::class, 'berita'])->name('berita');
Route::get('/sejarah', [portalController::class, 'sejarah'])->name('sejarah');
Route::get('/visi', [portalController::class, 'visi'])->name('visi');
Route::get('/struktur-organisasi', [portalController::class, 'struktur_organisasi'])->name('struktur-organisasi');
Route::get('/tendik', [portalController::class, 'tendik'])->name('tendik');
Route::get('/program', [portalController::class, 'program'])->name('program');
Route::get('/program', [portalController::class, 'program'])->name('program');
Route::get('/article-berjualan', [portalController::class, 'article_berjualan'])->name('article-berjualan');
Route::get('/article-marketing', [portalController::class, 'article_marketing'])->name('article-marketing');
Route::get('/article-bisnis', [portalController::class, 'article_bisnis'])->name('article-bisnis');

// view e-learning dashboard
Route::get('/e-learning', [ElearningController::class, 'index'])->name('e-learning')->middleware(['auth']);



//route admincontroller
Route::get('/data-mapel-page', [AdminController::class, 'mapel_page'])->name('data-mapel-page');
Route::get('/data-kelas-page', [AdminController::class, 'kelas_page'])->name('data-kelas-page');
Route::get('/data-siswa-page', [AdminController::class, 'siswa_page'])->name('data-siswa-page');
Route::get('/data-guru-page', [AdminController::class, 'guru_page'])->name('data-guru-page');
Route::get('/data-ruangan-page', [AdminController::class, 'ruangan_page'])->name('data-ruangan-page');
Route::get('/data-pengumuman-page', [AdminController::class, 'pengumuman_page'])->name('data-pengumuman-page');
Route::get('/data-penghargaan-page', [AdminController::class, 'penghargaan_page'])->name('data-penghargaan-page');
Route::get('/data-kegiatan-page', [AdminController::class, 'kegiatan_page'])->name('data-kegiatan-page');
// crud admin
// mapel
Route::post('/mapel-store', [MapelController::class, 'store'])->name('mapel-store');
Route::post('/mapel-update/{id}', [MapelController::class, 'update'])->name('mapel-update');
Route::post('/mapel-delete/{id}', [MapelController::class, 'destroy'])->name('mapel-delete');
// kelas
Route::post('/kelas-store', [CrudKelasController::class, 'store'])->name('kelas-store');
Route::post('/kelas-update/{id}', [CrudKelasController::class, 'update'])->name('kelas-update');
Route::post('/kelas-delete/{id}', [CrudKelasController::class, 'destroy'])->name('kelas-delete');
//siswa
Route::post('/siswa-store', [CrudSiswaController::class, 'store'])->name('siswa-store');


// ruang kelas
Route::post('/ruang-store', [CrudRuanganController::class, 'store'])->name('ruang-store');
Route::post('/ruang-update/{id}', [CrudRuanganController::class, 'update'])->name('ruang-update');
Route::post('/ruang-delete/{id}', [CrudKelasController::class, 'destroy'])->name('ruang-delete');




//route gurucontroller
Route::get('/materi-upload-page', [GuruController::class, 'materi_upload'])->name('materi-upload-page');
Route::get('/tugas-upload-page', [GuruController::class, 'tugas_upload'])->name('tugas-upload-page');
Route::get('/soal-upload-page', [GuruController::class, 'soal_page'])->name('soal-upload-page');
Route::get('/review-ujian-page', [GuruController::class, 'review_page'])->name('review-ujian-page');

//route siswaController
Route::get('/all-class', [SiswaController::class, 'all_class'])->name('all-class');
Route::get('/uts', [SiswaController::class, 'uts'])->name('uts');
Route::get('/uas', [SiswaController::class, 'uas'])->name('uas');
Route::get('/un', [SiswaController::class, 'un'])->name('un');
Route::get('/profile-class', [SiswaController::class, 'profile_class'])->name('profile-class');


require __DIR__ . '/auth.php';
