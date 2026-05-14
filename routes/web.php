<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Route::get('/detail-loker', function () {
    return view('pages.detail_loker');
})->name('detail.loker');

Route::get('/perusahaan/detail', function () {
    return view('pages.perusahaan'); 
})->name('perusahaan.detail');

Route::get('/event', function () {
    return view('pages.event');
})->name('event');

Route::get('/lamaran', function () {
    return view('pages.lamaran');
})->name('lamaran');

Route::get('/success', function () {
    return view('pages.success');
});

Route::post('/lamaran-submit', function () {
    return redirect('/success');
});

Route::view('/rsvp', 'pages.rsvp')->name('rsvp');


Route::get('/course',function(){
    return view('course.index');
});

require __DIR__.'/auth.php';

//admin
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin');

Route::get('/admin/event', function () {
    return view('admin.event.index');
});

Route::get('/admin/event/create', function () {
    return view('admin.event.create');
});

Route::get('/admin/event/edit', function () {
    return view('admin.event.edit');
});

Route::get('/admin/loker', function () {
    return view('admin.loker.index');
});

Route::get('/admin/loker/create', function () {
    return view('admin.loker.create');
});

Route::get('/admin/group', function () {
    return view('admin.group.index');
});

Route::get('/join-group', function () {
    return view('pages.join_group');
})->name('join_group');

Route::get('/admin/user', function () {
    return view('admin.user.index');
});

Route::get('/course',function(){
    return view('course.index');
});

Route::get('/group',function(){
    return view('pages.group');
});

//service
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

Route::get('/rsvp', function () {
    return view('pages.rsvp');
});

// Route::get('/rsvp', function () {
//     return view('pages.rsvp');
// });

Route::post('/rsvp-submit', function (Request $request) {

    // nanti bisa simpan database di sini

    return redirect('/berhasil_daftar_event');
});

Route::get('/berhasil_daftar_event', function () {
    return view('pages.berhasil_daftar_event');
});
