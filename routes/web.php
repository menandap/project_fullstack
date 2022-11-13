<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashboardController;

// AUTH
Route::view('/login', 'auth.login')->name('login');
Route::post('/actLogin', [UserAuthController::class, 'actLogin'])->name('actLogin');
Route::view('/register', 'auth.register')->name('register');
Route::post('/actRegister', [UserAuthController::class, 'actRegister']);
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

// HOME
Route::view('/', 'home.index')->name('home');

// DASHBOARD
Route::group(['middleware' => 'auth'], function () {
    Route::view('/mydashboard', 'dashboard-usr.index')->name('dashboard');
    Route::get('/myundangan', [UserDashboardController::class, 'undangan']);
    Route::get('/myundangan/{id}/show', [UserDashboardController::class, 'undangan_show'])->name('undangandetail');
    Route::get('/myundangan/create', [UserDashboardController::class, 'undangan_create']);
    Route::post('/myundangan/store', [UserDashboardController::class, 'undangan_store']);
    Route::get('/myundangan/{id}/edit', [UserDashboardController::class, 'undangan_edit']);
    Route::post('/myundangan/{id}/update', [UserDashboardController::class, 'undangan_update']);
    Route::get('/myundangan/{id}/delete', [UserDashboardController::class, 'undangan_delete']);

    Route::get('/myevent', [UserDashboardController::class, 'event']);
    Route::get('/myevent/{id}/show', [UserDashboardController::class, 'event_show'])->name('eventdetail');
    Route::get('/myevent/create', [UserDashboardController::class, 'event_create']);
    Route::post('/myevent/store', [UserDashboardController::class, 'event_store']);
    Route::get('/myevent/{id}/edit', [UserDashboardController::class, 'event_edit']);
    Route::post('/myevent/{id}/update', [UserDashboardController::class, 'event_update']);
    Route::get('/myevent/{id}/delete', [UserDashboardController::class, 'event_delete']);

    Route::get('/mystory', [UserDashboardController::class, 'story']);
    Route::get('/mystory/{id}/show', [UserDashboardController::class, 'story_show'])->name('storydetail');
    Route::get('/mystory/create', [UserDashboardController::class, 'story_create']);
    Route::post('/mystory/store', [UserDashboardController::class, 'story_store']);
    Route::get('/mystory/{id}/edit', [UserDashboardController::class, 'story_edit']);
    Route::post('/mystory/{id}/update', [UserDashboardController::class, 'story_update']);
    Route::get('/mystory/{id}/delete', [UserDashboardController::class, 'story_delete']);

    Route::get('/myimage/{id}/create', [UserDashboardController::class, 'image_create']);
    Route::post('/myimage/{id}/store', [UserDashboardController::class, 'image_store']);
    Route::get('/myimage/{id}/delete', [UserDashboardController::class, 'image_delete']);

    Route::get('/myaccount', [UserDashboardController::class, 'account']);

    Route::get('/mytransaction', [UserDashboardController::class, 'transaction']);
    

    Route::get('/seeundangan/{id}', [UserDashboardController::class, 'see_undangan'])->name('seeundangan');
});

// UNDANGAN
Route::view('/viewundangan', 'undangan.template-1')->name('viewundangan');
Route::view('/viewundangan-2', 'undangan.template-2');
