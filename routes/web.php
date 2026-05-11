<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
}) ->name('welcome'); 

Route::get('/detail-loker', function () {
    return view('pages.detail_loker');
});

Route::get('/perusahaan/detail', function () {
    return view('pages.perusahaan'); // Nama file: perusahaan.blade.php
})->name('perusahaan.detail');