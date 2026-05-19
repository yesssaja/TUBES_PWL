<?php

use Illuminate\Support\Facades\Route;

// USER / PUBLIC CONTROLLERS
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GroupController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PerusahaanController as AdminPerusahaanController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\GroupController as AdminGroupController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\RsvpController as AdminRsvpController;
use App\Http\Controllers\Admin\LokerController as AdminLokerController;
use App\Http\Controllers\Admin\LamaranController as AdminLamaranController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Perusahaan Public Route
|--------------------------------------------------------------------------
*/

Route::get('/perusahaan/detail', [PerusahaanController::class, 'detail'])
    ->name('perusahaan.detail.default');

Route::get('/perusahaan/detail/{perusahaan}', [PerusahaanController::class, 'detail'])
    ->name('perusahaan.detail');

/*
|--------------------------------------------------------------------------
| Review Public Route
|--------------------------------------------------------------------------
*/

Route::get('/perusahaan/review/{perusahaan}', [ReviewController::class, 'index'])
    ->name('perusahaan.review');

Route::get('/review/tulis/{perusahaan}', [ReviewController::class, 'create'])
    ->name('tulis.review');

Route::post('/review/tulis', [ReviewController::class, 'store'])
    ->name('review.store');

/*
|--------------------------------------------------------------------------
| Event Public Route
|--------------------------------------------------------------------------
*/

Route::get('/event', [EventController::class, 'index'])
    ->name('event.index');

Route::get('/event/{event}', [EventController::class, 'show'])
    ->name('event.show');

/*
|--------------------------------------------------------------------------
| Loker Public Route
|--------------------------------------------------------------------------
*/

Route::get('/loker', [LokerController::class, 'index'])
    ->name('loker.index');

Route::get('/loker/{loker}', [LokerController::class, 'show'])
    ->name('loker.show');

Route::get('/detail-loker', function () {
    return redirect()->route('loker.index');
})->name('detail.loker.redirect');

Route::get('/detail-loker/{loker}', [LokerController::class, 'show'])
    ->name('detail.loker');

/*
|--------------------------------------------------------------------------
| Success Route
|--------------------------------------------------------------------------
*/

Route::get('/success', function () {
    return view('pages.success');
})->name('success');

/*
|--------------------------------------------------------------------------
| User Group Public Route
|--------------------------------------------------------------------------
*/

Route::get('/group', [GroupController::class, 'index'])
    ->name('groups.index');

Route::get('/join-group/{group:slug}', [GroupController::class, 'show'])
    ->name('join_group');

/*
|--------------------------------------------------------------------------
| Service Route
|--------------------------------------------------------------------------
*/

Route::get('/service', [ServiceController::class, 'index'])
    ->name('service.index');

Route::get('/service/all', [ServiceController::class, 'all'])
    ->name('service.all');

Route::get('/service/detail/{service}', [ServiceController::class, 'show'])
    ->name('service.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/service/form', [ServiceController::class, 'create'])
        ->name('service.create');

    Route::post('/service', [ServiceController::class, 'store'])
        ->name('service.store');
});

/*
|--------------------------------------------------------------------------
| Course Route
|--------------------------------------------------------------------------
*/

Route::get('/course', function () {
    return view('course.index');
})->name('course.index');

/*
|--------------------------------------------------------------------------
| Auth Route
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| User Route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | RSVP User Route
    |--------------------------------------------------------------------------
    */

    Route::get('/rsvp', function () {
        return redirect()
            ->route('event.index')
            ->with('error', 'Pilih event terlebih dahulu sebelum RSVP.');
    })->name('rsvp.redirect');

    Route::get('/rsvp/{event}', [RsvpController::class, 'create'])
        ->name('rsvp.create');

    Route::post('/rsvp/{event}', [RsvpController::class, 'store'])
        ->name('rsvp.store');

    Route::get('/berhasil_daftar_event', function () {
        return view('pages.berhasil_daftar_event');
    })->name('rsvp.success');

    /*
    |--------------------------------------------------------------------------
    | Lamaran User Route
    |--------------------------------------------------------------------------
    */

    Route::get('/lamaran', function () {
        return redirect()
            ->route('loker.index')
            ->with('error', 'Pilih loker terlebih dahulu sebelum mengirim lamaran.');
    })->name('lamaran.redirect');

    Route::get('/lamaran/{loker}', [LamaranController::class, 'create'])
        ->name('lamaran.create');

    Route::post('/lamaran/{loker}', [LamaranController::class, 'store'])
        ->name('lamaran.store');

    /*
    |--------------------------------------------------------------------------
    | Group User Action Route
    |--------------------------------------------------------------------------
    */

    Route::post('/group/{group:slug}/join', [GroupController::class, 'join'])
        ->name('groups.join');

    Route::delete('/group/{group:slug}/leave', [GroupController::class, 'leave'])
        ->name('groups.leave');
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

        /*
        |--------------------------------------------------------------------------
        | Dashboard Admin
        |--------------------------------------------------------------------------
        */

        Route::get('/', function () {
            $totalUser = \App\Models\User::count();
            $totalEvent = \App\Models\Event::count();
            $totalLoker = \App\Models\Loker::count();
            $totalLamaran = \App\Models\Lamaran::count();
            $totalPerusahaan = \App\Models\Perusahaan::count();
            $totalGroup = \App\Models\Group::count();
            $totalReview = \App\Models\Review::count();

            return view('admin.admin', compact(
                'totalUser',
                'totalEvent',
                'totalLoker',
                'totalLamaran',
                'totalPerusahaan',
                'totalGroup',
                'totalReview'
            ));
        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | User Admin
        |--------------------------------------------------------------------------
        */
        Route::get('/user', [AdminUserController::class, 'index'])
            ->name('user.index');

        Route::delete('/user/{user}', [AdminUserController::class, 'destroy'])
            ->name('user.destroy');

        /*
        |--------------------------------------------------------------------------
        | Perusahaan Admin
        |--------------------------------------------------------------------------
        */

        Route::resource('perusahaan', AdminPerusahaanController::class)
            ->except(['show']);

        /*
        |--------------------------------------------------------------------------
        | Loker Admin
        |--------------------------------------------------------------------------
        */

        Route::resource('loker', AdminLokerController::class)
            ->except(['show']);

        /*
        |--------------------------------------------------------------------------
        | Lamaran Admin
        |--------------------------------------------------------------------------
        */

        Route::get('/lamaran', [AdminLamaranController::class, 'index'])
            ->name('lamaran.index');

        Route::put('/lamaran/{lamaran}/approve', [AdminLamaranController::class, 'approve'])
            ->name('lamaran.approve');

        Route::put('/lamaran/{lamaran}/reject', [AdminLamaranController::class, 'reject'])
            ->name('lamaran.reject');

        /*
        |--------------------------------------------------------------------------
        | Event Admin
        |--------------------------------------------------------------------------
        */

        Route::resource('event', AdminEventController::class)
            ->except(['show']);

        /*
        |--------------------------------------------------------------------------
        | RSVP Admin
        |--------------------------------------------------------------------------
        */

        Route::get('/rsvp', [AdminRsvpController::class, 'index'])
            ->name('rsvp.index');

        Route::put('/rsvp/{rsvp}/approve', [AdminRsvpController::class, 'approve'])
            ->name('rsvp.approve');

        Route::put('/rsvp/{rsvp}/reject', [AdminRsvpController::class, 'reject'])
            ->name('rsvp.reject');

        /*
        |--------------------------------------------------------------------------
        | Group Admin
        |--------------------------------------------------------------------------
        */

        Route::prefix('groups')
            ->name('groups.')
            ->group(function () {
                Route::get('/', [AdminGroupController::class, 'index'])
                    ->name('index');

                Route::get('/create', [AdminGroupController::class, 'create'])
                    ->name('create');

                Route::post('/', [AdminGroupController::class, 'store'])
                    ->name('store');

                Route::get('/{group:slug}/edit', [AdminGroupController::class, 'edit'])
                    ->name('edit');

                Route::put('/{group:slug}', [AdminGroupController::class, 'update'])
                    ->name('update');

                Route::delete('/{group:slug}', [AdminGroupController::class, 'destroy'])
                    ->name('destroy');
            });

        /*
        |--------------------------------------------------------------------------
        | Review Admin
        |--------------------------------------------------------------------------
        */

        Route::prefix('review')
            ->name('review.')
            ->group(function () {
                Route::get('/', [AdminReviewController::class, 'index'])
                    ->name('index');

                Route::get('/{review}/edit', [AdminReviewController::class, 'edit'])
                    ->name('edit');

                Route::put('/{review}', [AdminReviewController::class, 'update'])
                    ->name('update');

                Route::delete('/{review}', [AdminReviewController::class, 'destroy'])
                    ->name('destroy');

                Route::put('/{review}/reply', [AdminReviewController::class, 'reply'])
                    ->name('reply');
            });
    });