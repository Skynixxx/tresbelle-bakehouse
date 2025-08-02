<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Public Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cake/{id}', [DashboardController::class, 'show'])->name('cake.show');
