<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
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
