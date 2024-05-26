<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('home-page', ['title' => 'Home']);
});
Route::get('/album', function () {
    return view('album-page', ['title' => 'album']);
});
Route::get('/alumni', function () {
    return view('data-alumni-page', ['title' => 'Data alumni']);
});
Route::get('/berita', function () {
    return view('berita-page', ['title' => 'Data berita']);
});
Route::get('/sejarah', function () {
    return view('sejarah-page', ['title' => 'Halaman sejarah']);
});
Route::get('/visi', function () {
    return view('visi-page', ['title' => 'Halaman Visi & misi']);
});
Route::get('/struktur-organisasi', function () {
    return view('struktur-organisasi-page', ['title' => 'Halaman Struktur Organisasi']);
});
Route::get('/tendik', function () {
    return view('tendik-page', ['title' => 'Halaman Tenaga Pendidik']);
});
Route::get('/program', function () {
    return view('program-page', ['title' => 'Halaman Program Sekolah']);
});
Route::get('/article-berjualan', function () {
    return view('article-berjualan-page', ['title' => 'Halaman Program Sekolah']);
});
Route::get('/article-marketing', function () {
    return view('article-marketing-page', ['title' => 'Halaman Program Sekolah']);
});
Route::get('/article-bisnis', function () {
    return view('article-bisnis-page', ['title' => 'Halaman Program Sekolah']);
});




require __DIR__ . '/auth.php';
