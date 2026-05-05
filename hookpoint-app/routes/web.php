<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'dashboard']);
Route::get('/dashboard', [PageController::class, 'dashboard']);
Route::get('/lapak', [PageController::class, 'lapak']);
Route::get('/login', [PageController::class, 'login']);
Route::post('/login', [PageController::class, 'prosesLogin']);
Route::get('/register', [PageController::class, 'register']);
Route::post('/register', [PageController::class, 'prosesRegister']);
