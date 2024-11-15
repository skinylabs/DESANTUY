<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DataDesaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Desa
    Route::resource('data_desa', DataDesaController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk halaman utama atau rute lain
Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';
