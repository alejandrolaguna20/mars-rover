<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarsRoverController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [MarsRoverController::class, 'home'])->middleware('auth');

Route::post('/update-logs', [MarsRoverController::class, 'update_logs'])->middleware('auth');
