<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BAK_PembagianruangController;
use App\Http\Controllers\IRSController;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'postLogin')->name('login.post');
    Route::get('logout', 'logout')->name('logout');
});

// Protected Routes (should be wrapped in middleware later)
Route::group([], function () {
    // Dosen Dashboard Routes
    Route::prefix('dashboardDosen')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboardDosen');
    });

    // Mahasiswa Dashboard Routes
    Route::prefix('dashboardMahasiswa')->group(function () {
        Route::get('/', [DashboardController::class, 'indexMahasiswa'])->name('dashboardMahasiswa');
    });

    // Kaprodi Dashboard Routes
    Route::prefix('dashboardKaprodi')->group(function () {
        Route::get('/', [DashboardController::class, 'indexKaprodi'])->name('dashboardKaprodi');
    });

    // Akademik Dashboard Routes
    Route::prefix('dashboardAkademik')->group(function () {
        Route::get('/', [DashboardController::class, 'indexAkademik'])->name('dashboardAkademik');
    });

    // Pengisian IRS 
    Route::prefix('irsMahasiswa')->group(function () {
        Route::get('/', [IRSController::class, 'index'])->name('irsMahasiswa');

    });
});

// Role Selection Page for Dosen
Route::get('/roleSelection', [AuthController::class, 'roleSelection'])->name('roleSelection');
Route::post('/handleRoleSelection', [AuthController::class, 'handleRoleSelection'])->name('handleRoleSelection');
Route::post('/submit-role-selection', [AuthController::class, 'submitRoleSelection'])->name('submitRoleSelection');

// Protected Routes with Authentication
Route::middleware('auth')->group(function () {
    Route::get('/dashboardMahasiswa', [DashboardController::class, 'indexMahasiswa'])->name('dashboardMahasiswa');
    Route::get('/dashboardAkademik', [DashboardController::class, 'indexAkademik'])->name('dashboardAkademik');
    Route::get('/dashboardDekan', [DashboardController::class, 'indexDekan'])->name('dashboardDekan');
    Route::get('/dashboardKaprodi', [DashboardController::class, 'indexKaprodi'])->name('dashboardKaprodi');
    Route::get('/dashboardDosen', [DashboardController::class, 'index'])->name('dashboardDosen');
    Route::get('/IRSMahasiswa', [IRSController::class, 'index'])->name('irsMahasiswa');
});

// Route::get('/dashboardAkademik', [DashboardController::class, 'indexAkademik'])->name('dashboardAkademik');
// Route::get('/pembagianruang', [BAK_PembagianruangController::class, 'index'])->name('pembagianruang');;
