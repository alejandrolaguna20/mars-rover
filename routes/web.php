<?php

use App\Http\Controllers\MarsRoverController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [MarsRoverController::class, 'home']);
