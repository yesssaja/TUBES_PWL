<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Loker;
use App\Models\Service;
use App\Models\Course;
use App\Models\CourseRegistration;

// PELAMAR CONTROLLERS
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupCommentController;
use App\Http\Controllers\ProfileSettingsController;
use App\Http\Controllers\SearchController;

//PERUSAHAAN CONTROLLER
use App\Http\Controllers\Perusahaan\ManajemenController;
use App\Http\Controllers\Perusahaan\CoursePaymentController;
use App\Http\Controllers\Perusahaan\ReviewController as PerusahaanReviewController;
use App\Http\Controllers\Perusahaan\CourseParticipantController;
use App\Http\Controllers\Perusahaan\LokerController as PerusahaanLokerController;
use App\Http\Controllers\Perusahaan\EventController as PerusahaanEventController;
use App\Http\Controllers\Perusahaan\RsvpController as PerusahaanRsvpController;
use App\Http\Controllers\Perusahaan\ProfilController;
use App\Http\Controllers\Perusahaan\CourseController as PerusahaanCourseController;
use App\Http\Controllers\Perusahaan\LamaranController as PerusahaanLamaranController;
use App\Http\Controllers\Perusahaan\InboxController as PerusahaanInboxController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Admin\CourseRegistrationController as AdminCourseRegistrationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PerusahaanController as AdminPerusahaanController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\GroupController as AdminGroupController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\RsvpController as AdminRsvpController;
use App\Http\Controllers\Admin\LokerController as AdminLokerController;
use App\Http\Controllers\Admin\LamaranController as AdminLamaranController;

// LOGIN CONTROLLERS
use App\Http\Controllers\ProfilePelamarController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $lokers = Loker::with('perusahaan')
        ->latest()
        ->take(3)
        ->get();

    $services = Service::all(); 

    $courses = Course::with('links')
        ->where('is_active', true)
        ->orderBy('id', 'asc')
        ->take(3)
        ->get();

    $registrations = collect();

    if (Auth::check()) {
        $registrations = CourseRegistration::where('pelamar_id', Auth::id())
            ->get()
            ->keyBy('course_id');
    }
    
    return view('users.index', compact('lokers', 'services', 'courses', 'registrations'));
})->name('index');

/*
|--------------------------------------------------------------------------
| Perusahaan Public Route
|--------------------------------------------------------------------------
*/

Route::get('/perusahaan', [PerusahaanController::class, 'index'])
    ->name('perusahaan.index');

Route::get('/perusahaan/detail/{perusahaan}', [PerusahaanController::class, 'detail'])
    ->name('perusahaan.detail');

Route::get('/perusahaan/review/{perusahaan}', [PerusahaanController::class, 'review'])
    ->name('perusahaan.review');

Route::middleware(['auth'])->group(function () {
    Route::get('/perusahaan/{perusahaan}/tulis-review', [ReviewController::class, 'create'])->name('review.create');
    
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
});

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
    ->name('review.tulis.store');

/*
|--------------------------------------------------------------------------
| Event Public Route
|--------------------------------------------------------------------------
*/

Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

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
    
    Route::middleware(['auth'])->group(function () {
    Route::get('/group/create', [GroupController::class, 'create'])
        ->name('groups.create');

    Route::post('/group/store', [GroupController::class, 'store'])
        ->name('groups.store');

    Route::delete('/groups/comment/{id}', [GroupCommentController::class, 'destroy'])
    ->name('groups.comment.destroy')
    ->middleware('auth');
});

/*
|--------------------------------------------------------------------------
| Service Route
|--------------------------------------------------------------------------
*/

Route::get('/service', [ServiceController::class, 'index'])
    ->name('service.index');

Route::get('/service/all', [ServiceController::class, 'all'])
    ->name('service.all');

Route::get('/service/search/ajax', [ServiceController::class, 'searchAjax'])
    ->name('service.search.ajax');
    
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

Route::middleware(['auth'])->group(function () {
    
    Route::get('/course', [CourseController::class, 'index'])
    ->name('course.index');
    
    Route::get('/course/{course}/register', [CourseController::class, 'registerForm'])
    ->name('course.register.form');
    
    Route::post('/course/{course}/register', [CourseController::class, 'register'])
    ->name('course.register');
    
    Route::get('/course/{course}/access', [CourseController::class, 'access'])
    ->name('course.access');
    
    });
    
/*
|--------------------------------------------------------------------------
| Search Route
|--------------------------------------------------------------------------
*/
    Route::get('/search', [SearchController::class, 'index'])
        ->name('search.global');

/*
|--------------------------------------------------------------------------
| Auth Route
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function(){
    Route::get('/profile-pelamar', [ProfilePelamarController::class, 'index'])
        ->name('profile.pelamar.index');

    Route::get('/profile-pelamar/create', [ProfilePelamarController::class, 'create'])
        ->name('profile.pelamar.create');

    Route::post('/profile-pelamar', [ProfilePelamarController::class, 'store'])
        ->name('profile.pelamar.store');});

/*
|--------------------------------------------------------------------------
| User Route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // /*
    // |--------------------------------------------------------------------------
    // | Course User Route
    // |--------------------------------------------------------------------------
    // */
    
    // Route::get('/course/{course}/daftar', [CourseController::class, 'registerForm'])
    //     ->name('course.register.form');
    
    // Route::post('/course/{course}/daftar', [CourseController::class, 'register'])
    //     ->name('course.register');
    
    // Route::get('/course/{course}/akses', [CourseController::class, 'access'])
    //     ->name('course.access');
    
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
        return view('users.event.success');
    })->name('rsvp.success');

/*
    |--------------------------------------------------------------------------
    | Inboxes Route
    |--------------------------------------------------------------------------
    */
    Route::get('/inbox', [InboxController::class, 'index'])
    ->name('inbox.index');

Route::put('/inbox/{inbox}/read', [InboxController::class, 'read'])
    ->name('inbox.read');

Route::put('/inbox/read-all', [InboxController::class, 'readAll'])
    ->name('inbox.readAll');

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
    
    Route::get('/lamaran/{loker}/success', [LamaranController::class, 'success'])
        ->name('lamaran.success');

    /*
    |--------------------------------------------------------------------------
    | Group User Action Route
    |--------------------------------------------------------------------------
    */

    Route::post('/group/{group:slug}/join', [GroupController::class, 'join'])
        ->name('groups.join');

    Route::delete('/group/{group:slug}/leave', [GroupController::class, 'leave'])
        ->name('groups.leave');

    Route::post('/group/{group:slug}/comment', [GroupCommentController::class, 'store'])
        ->name('groups.comment.store');

    /*
    |--------------------------------------------------------------------------
    | Setting User Route
    |--------------------------------------------------------------------------
    */

    Route::get('/profile/settings',[ProfileSettingsController::class,'edit'])->name('profile.settings.edit');
    Route::put('/profile/settings',[ProfileSettingsController::class,'update'])->name('profile.settings.update');
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

Route::get('/', [Admincontroller::class, 'dashboard'])
    ->name('dashboard');

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
});


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

            /*
        |--------------------------------------------------------------------------
        | Course Admin
        |--------------------------------------------------------------------------
        */

        Route::get('/course', [AdminCourseRegistrationController::class, 'index'])
            ->name('course.index');

        Route::put('/course/{registration}/approve', [AdminCourseRegistrationController::class, 'approve'])
            ->name('course.approve');

        Route::put('/course/{registration}/reject', [AdminCourseRegistrationController::class, 'reject'])
            ->name('course.reject');

        Route::delete('/course/{registration}', [AdminCourseRegistrationController::class, 'destroy'])
            ->name('course.destroy');

        Route::put('/course/{registration}/verify-payment', [AdminCourseRegistrationController::class, 'verifyPayment'])
            ->name('course.verifyPayment');

        Route::put('/course/{registration}/reject-payment', [AdminCourseRegistrationController::class, 'rejectPayment'])
            ->name('course.rejectPayment');

           /*
        |--------------------------------------------------------------------------
        | Notif Admin
        |--------------------------------------------------------------------------
        */
        Route::get('/admin/dashboard', [Admincontroller::class, 'dashboard'])
            ->name('admin.dashboard');
    });

    Route::get('/profile', function () {
    return view('pages.profile');
});

/*
|--------------------------------------------------------------------------
| Route Perusahaan
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'perusahaan'])
    ->prefix('perusahaan')
    ->name('perusahaan.')
    ->group(function () {
        Route::view('/dashboard', 'perusahaan.dashboard.index')->name('dashboard');

        //loker yang dibuat
        Route::get('/lowongan', [PerusahaanLokerController::class, 'index'])->name('lowongan.index');
        Route::get('/lowongan/create', [PerusahaanLokerController::class, 'create'])->name('lowongan.create');
        Route::post('/lowongan', [PerusahaanLokerController::class, 'store'])->name('lowongan.store');
        Route::get('/lowongan/{lowongan}', [PerusahaanLokerController::class, 'show'])->name('lowongan.show');
        Route::get('/lowongan/{lowongan}/edit', [PerusahaanLokerController::class, 'edit'])->name('lowongan.edit');
        Route::put('/lowongan/{lowongan}', [PerusahaanLokerController::class, 'update'])->name('lowongan.update');
        Route::delete('/lowongan/{lowongan}', [PerusahaanLokerController::class, 'destroy'])->name('lowongan.destroy');

        //lamaran yg d terima
         Route::get('/lamaran', [PerusahaanLamaranController::class, 'index'])
            ->name('lamaran.index');
        Route::get('/lamaran/{id}', [PerusahaanLamaranController::class, 'show'])
            ->name('lamaran.show');
        Route::put('/lamaran/{id}/approve', [PerusahaanLamaranController::class, 'approve'])
            ->name('lamaran.approve');
        Route::put('/lamaran/{id}/reject', [PerusahaanLamaranController::class, 'reject'])
            ->name('lamaran.reject');
            
        //event yg diadakan perusahaan
        Route::get('/event', [PerusahaanEventController::class, 'index'])
            ->name('event.index');
        Route::get('/event/create', [PerusahaanEventController::class, 'create'])
            ->name('event.create');
        Route::post('/event/store', [PerusahaanEventController::class, 'store'])
            ->name('event.store');
        Route::get('/event/{id}', [PerusahaanEventController::class, 'show'])
            ->name('event.show');
        Route::get('/event/{id}/edit', [PerusahaanEventController::class, 'edit'])
            ->name('event.edit');
        Route::put('/event/{id}', [PerusahaanEventController::class, 'update'])
            ->name('event.update');
        Route::delete('/event/{id}', [PerusahaanEventController::class, 'destroy'])
            ->name('event.destroy');

        //profile
        Route::get('/profil',[ProfilController::class, 'index'])->name('profil.index');
        Route::post('/profil/update',[ProfilController::class, 'update'])->name('profil.update');Route::view('/pengaturan', 'perusahaan.pengaturan.index')->name('pengaturan.index');        Route::post('/profil/update',[ProfilController::class, 'update'])->name('profil.update');

        //manajemen
        Route::get('/manajemen', [ManajemenController::class, 'index'])
        ->name('manajemen.index');

        //rsvp perusahaan
        Route::get('/rsvp', [PerusahaanRsvpController::class, 'index'])
            ->name('rsvp.index');
        Route::get('/rsvp/{id}', [PerusahaanRsvpController::class, 'show'])
            ->name('rsvp.show');
        Route::put('/rsvp/{id}/approve', [PerusahaanRsvpController::class, 'approve'])
            ->name('rsvp.approve');
        Route::put('/rsvp/{id}/reject', [PerusahaanRsvpController::class, 'reject'])
            ->name('rsvp.reject');

        //inboxes
        Route::get('/inbox', [PerusahaanInboxController::class, 'index'])->name('inbox.index');
        Route::put('/inbox/{id}/read', [PerusahaanInboxController::class, 'read'])->name('inbox.read');
        Route::put('/inbox/read-all', [PerusahaanInboxController::class, 'readAll'])->name('inbox.readAll');
        

        // course perusahaan
        Route::get('/course', [PerusahaanCourseController::class, 'index'])
            ->name('course.index');
        Route::get('/course/create', [PerusahaanCourseController::class, 'create'])
            ->name('course.create');
        Route::post('/course/store', [PerusahaanCourseController::class, 'store'])
            ->name('course.store');
        Route::get('/course/{course}', [PerusahaanCourseController::class, 'show'])
            ->name('course.show');
        Route::get('/course/{course}/edit', [PerusahaanCourseController::class, 'edit'])
            ->name('course.edit');
        Route::put('/course/{course}', [PerusahaanCourseController::class, 'update'])
            ->name('course.update');
        Route::delete('/course/{course}', [PerusahaanCourseController::class, 'destroy'])
            ->name('course.destroy');
         Route::get('/course-participant',[CourseParticipantController::class, 'index'])
            ->name('course.participant.index');
        Route::get('/course-participant/{course}',[CourseParticipantController::class, 'show'])
            ->name('course.participant.show');
        Route::put('/course-registration/{registration}/approve',[CourseParticipantController::class, 'approve'])
            ->name('course.participant.approve');
        Route::put('/course-registration/{registration}/reject',[CourseParticipantController::class, 'reject'])
            ->name('course.participant.reject');
        Route::put('/course/payment/{payment}/verify',[CoursePaymentController::class, 'verify'])
            ->name('course.payment.verify');
        Route::put('/course/payment/{payment}/reject',[CoursePaymentController::class, 'reject'])
            ->name('course.payment.reject');

            //review
        Route::get('/review', [PerusahaanReviewController::class, 'index'])
            ->name('review.index');
        Route::post('/review/{review}/reply', [PerusahaanReviewController::class, 'reply'])
            ->name('review.reply');   
        });

