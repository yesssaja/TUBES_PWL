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

Route::view('/rsvp', 'pages.rsvp')->name('rsvp');

Route::get('/course',function(){
    return view('course.index');
});

require __DIR__.'/auth.php';