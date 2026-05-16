<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\RsvpController as AdminRsvpController;
use App\Http\Controllers\ServiceController;
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

Route::get('/lamaran', [LamaranController::class, 'create'])->name('lamaran.create');
Route::post('/lamaran', [LamaranController::class, 'store'])->name('lamaran.store');

Route::get('/perusahaan/detail', function () {
    return view('pages.perusahaan');
})->name('perusahaan.detail');

Route::get('/perusahaan/review', function () {
    return view('pages.review'); 
})->name('perusahaan.review');

Route::get('/review/tulis', function () {
    return view('pages.tulis_review'); 
})->name('tulis.review');

Route::get('/event', [EventController::class, 'index'])
    ->name('event.index');

Route::get('/event/{id}', [EventController::class, 'show'])
    ->name('event.show');

// Route::get('/lamaran', function () {
//     return view('pages.lamaran');
// })->name('lamaran');

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

Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/form', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');

// Route::get('/service', function () {
//     return view('pages.service');
// });

Route::get('/service/detail', function () {
    return view('pages.detail-service');
});

// Route::get('/service/form', function () {
//     return view('pages.tawarkan-service');
// });

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

    // Route::resource('lamaran', LamaranController::class);

    Route::get('/rsvp', [RsvpController::class, 'create'])
    ->name('rsvp.create');

Route::post('/rsvp', [RsvpController::class, 'store'])
    ->name('rsvp.store');

});

/*
|--------------------------------------------------------------------------
| Admin Route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
->prefix('admin')
->name('admin.')
->group(function () {

    Route::get('/', function () {
        return view('admin.admin');
    })->name('dashboard');

    Route::resource('perusahaan', PerusahaanController::class);

    Route::resource('loker', LokerController::class);

    Route::resource('event', AdminEventController::class);


     // RSVP ADMIN
    //  Route::get('/rsvp', [AdminRsvpController::class, 'index'])
    Route::get('/rsvp', [AdminRsvpController::class, 'index'])
    ->name('rsvp.index');

Route::put('/rsvp/{id}/approve', [AdminRsvpController::class, 'approve'])
    ->name('rsvp.approve');

Route::put('/rsvp/{id}/reject', [AdminRsvpController::class, 'reject'])
    ->name('rsvp.reject');
});

/*
|--------------------------------------------------------------------------
| RSVP Submit
|--------------------------------------------------------------------------
*/

Route::get('/berhasil_daftar_event', function () {
    return view('pages.berhasil_daftar_event');
});