<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('album', function () {
    return view('album', ['title' => 'album']);
});
Route::get('alumni', function () {
    return view('data-alumni', ['title' => 'Data alumni']);
});
