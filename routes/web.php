<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DataDesaController;
use App\Http\Controllers\Backend\DataPenduduk\DusunController;
use App\Http\Controllers\Backend\DataPenduduk\KkController;
use App\Http\Controllers\Backend\DataPenduduk\KkMemberController;
use App\Http\Controllers\Backend\DataPenduduk\KtpController;
use App\Http\Controllers\Backend\DataPenduduk\RtController;
use App\Http\Controllers\Backend\DataPenduduk\RwController;
use App\Http\Controllers\Backend\DataPengguna\AdminController;
use App\Http\Controllers\Backend\DataPengguna\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Desa
    Route::resource('data-desa', DataDesaController::class);

    // Data Pengguna
    Route::prefix('data-pengguna')->group(function () {
        Route::resource('data-user', UserController::class);
        Route::resource('data-admin', AdminController::class);
    });

    // Data Penduduk (Prefix datapenduduk/)
    Route::prefix('data-penduduk')->group(function () {
        Route::resource('dusun', DusunController::class);
        Route::resource('rt', RtController::class);
        Route::resource('rw', RwController::class);
        Route::resource('ktp', KtpController::class);
        Route::resource('kk', KkController::class);
        Route::resource('kk-members', KkMemberController::class);
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk halaman utama atau rute lain
Route::get('/', function () {
    return view('pages.frontend.homepage');
});

require __DIR__ . '/auth.php';
