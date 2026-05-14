<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\LamaranController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Route::get('/detail-loker', function () {
    return view('pages.detail_loker');
})->name('detail.loker');

Route::get('/perusahaan/detail', function () {
    return view('pages.perusahaan');
})->name('perusahaan.detail');

Route::get('/perusahaan/review', function () {
    return view('pages.review'); 
})->name('perusahaan.review');

Route::get('/perusahaan/review/tulis', function () {
    return view('pages.tulis_review'); 
})->name('tulis.review');

Route::get('/event', function () {
    return view('pages.event');
})->name('event');

Route::get('/lamaran', function () {
    return view('pages.lamaran');
})->name('lamaran');

Route::get('/success', function () {
    return view('pages.success');
});

Route::get('/join-group', function () {
    return view('pages.join_group');
})->name('join_group');

Route::get('/group', function () {
    return view('pages.group');
});

/*
|--------------------------------------------------------------------------
| Service Route
|--------------------------------------------------------------------------
*/

Route::get('/service', function () {
    return view('pages.service');
});

Route::get('/service/detail', function () {
    return view('pages.detail-service');
});

Route::get('/service/form', function () {
    return view('pages.tawarkan-service');
});

Route::get('/service/all', function () {
    return view('pages.all-service');
});

/*
|--------------------------------------------------------------------------
| Auth Route
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| User Route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource('lamaran', LamaranController::class);

    Route::resource('rsvp', RsvpController::class);

});

/*
|--------------------------------------------------------------------------
| Admin Route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');

    Route::resource('perusahaan', PerusahaanController::class);

    Route::resource('loker', LokerController::class);

    Route::resource('event', EventController::class);

});

/*
|--------------------------------------------------------------------------
| RSVP Submit
|--------------------------------------------------------------------------
*/

Route::post('/rsvp-submit', function (Request $request) {

    return redirect('/berhasil_daftar_event');

});

Route::get('/berhasil_daftar_event', function () {
    return view('pages.berhasil_daftar_event');
});