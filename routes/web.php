<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\SentimentController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Route Aplikasi Analisis Sentimen
|--------------------------------------------------------------------------
*/

// 🔍 Analisis Sentimen
Route::post('/analyze', [SentimentController::class, 'analyze'])->name('analyze');

// 💬 Komentar (user)
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');

// 🏠 Redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// 🔐 Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 📊 Dashboard utama
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// ℹ️ Halaman Tentang
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// 🚪 Logout manual (fallback)
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Route Tambahan
|--------------------------------------------------------------------------
*/

// 👤 User Area (auth wajib)
Route::middleware('auth')->group(function () {
    Route::get('/hasil', [UserController::class, 'hasil'])->name('user.hasil');
    Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
});

// 🛠️ Admin Area (auth wajib)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/data', [AdminController::class, 'data'])->name('admin.data');
    Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.pengaturan');
    Route::put('/admin/pengaturan', [AdminController::class, 'updateSettings'])->name('admin.updateSettings');
});
