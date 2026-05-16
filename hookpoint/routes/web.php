<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


// ================= LANDING =================
Route::get('/', [LandingController::class, 'index']);

Route::get('/lapak', [LapakController::class, 'landing']);


// ================= ADMIN =================
Route::middleware(['auth', 'admin']) ->prefix('admin') ->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'adminProfile']);
    Route::get('/editprofil', [ProfileController::class, 'editAdmin']);
    Route::post('/editprofil', [ProfileController::class, 'update'])->name('admin.profile.update');

    // Lapak
    Route::get('/pengelolaan', [LapakController::class, 'admin']);
    Route::get('/lapak/live-search', [LapakController::class, 'liveSearch']);
    Route::get('/tambahlapak', [LapakController::class, 'create']);
    Route::post('/tambahlapak', [LapakController::class, 'store']);
    Route::get('/editlapak/{id}', [LapakController::class, 'edit']);
    Route::post('/editlapak/{id}', [LapakController::class, 'update']);

    // Transaksi
    Route::get('/transaksiAdmin', [AdminController::class, 'transaksi']);
});


// ================= USER =================
Route::middleware(['auth', 'user']) ->prefix('user') ->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard']);

    // Profile
    Route::get('/profileUser', [ProfileController::class, 'userProfile']);
    Route::get('/edit-profileUser', [ProfileController::class, 'editUser']);
    Route::post('/edit-profileUser', [ProfileController::class, 'update'])->name('user.profile.update');

    // Lapak
    Route::get('/lapakUser', [LapakController::class, 'user']);
    Route::get('/lapak/live-search', [LapakController::class, 'liveSearch']);

    // Transaksi
    Route::get('/transaksiUser', [UserController::class, 'transaksi']);
});


// ================= AUTH =================
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
require __DIR__ . '/auth.php';
