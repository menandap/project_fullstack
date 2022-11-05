<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashboardController;

// AUTH
Route::view('/login', 'auth.login')->name('login'); 
Route::post('/actLogin', [UserAuthController::class, 'actLogin']);
Route::view('/register', 'auth.register')->name('register'); 
Route::post('/actRegister', [UserAuthController::class, 'actRegister']);
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

// HOME
Route::view('/', 'home.index')->name('home'); 

// DASHBOARD

Route::view('/mydashboard', 'dashboard-usr.index')->name('dashboard'); 
Route::get('/myundangan', [UserDashboardController::class, 'undangan']);
Route::get('/myundangan/{id}/show', [UserDashboardController::class, 'undangan_show'])->name('undangandetail');
// Route::get('/myundangan/create', [UserDashboardController::class, 'undangan_create']);
// Route::post('/myundangan/store', [UserDashboardController::class, 'undangan_store']);
// Route::get('/myundangan/{id}/edit', [UserDashboardController::class, 'undangan_edit']);
// Route::post('/myundangan/{id}/update', [UserDashboardController::class, 'undangan_update']);
// Route::get('/myundangan/{id}/delete', [UserDashboardController::class, 'undangan_delete']);

Route::get('/myevent', [UserDashboardController::class, 'event']);
Route::get('/myevent/{id}/show', [UserDashboardController::class, 'event_show'])->name('eventdetail');

Route::get('/mytransaction', [UserDashboardController::class, 'transaction']);

// UNDANGAN
Route::view('/viewundangan', 'undangan.template-1')->name('viewundangan'); 
Route::view('/viewundangan-2', 'undangan.template-2');
Route::get('/view-undangan', [UserDashboardController::class, 'view_undangan'])->name('view-undangan'); 