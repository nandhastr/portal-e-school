<?php

use App\Http\Controllers\portalController;
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

// route view
Route::get('/', [portalController::class,'index'])->name('/');
Route::get('/album', [portalController::class,'album'])->name('album');
Route::get('/alumni', [portalController::class,'alumni'])->name('alumni');
Route::get('/berita', [portalController::class,'berita'])->name('berita');
Route::get('/sejarah', [portalController::class,'sejarah'])->name('sejarah');
Route::get('/visi', [portalController::class,'visi'])->name('visi');
Route::get('/struktur-organisasi', [portalController::class,'struktur_organisasi'])->name('struktur-organisasi');
Route::get('/tendik', [portalController::class,'tendik'])->name('tendik');
Route::get('/program', [portalController::class,'program'])->name('program');
Route::get('/program', [portalController::class,'program'])->name('program');
Route::get('/article-berjualan', [portalController::class,'article_berjualan'])->name('article-berjualan');
Route::get('/article-marketing', [portalController::class,'article_marketing'])->name('article-marketing');
Route::get('/article-bisnis', [portalController::class,'article_bisnis'])->name('article-bisnis');


require __DIR__ . '/auth.php';
