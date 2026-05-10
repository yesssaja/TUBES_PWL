<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Route::get('/detail-loker', function () {
    return view('pages.detail_loker');
});

Route::get('/event', function () {
    return view('pages.event');
})->name('event');

Route::get('/lamaran', function () {
    return view('pages.lamaran');
});

Route::get('/success', function () {
    return view('pages.success');
});

Route::post('/lamaran-submit', function () {
    return redirect('/success');
});

Route::view('/rsvp', 'pages.rsvp')->name('rsvp');

require __DIR__.'/auth.php';