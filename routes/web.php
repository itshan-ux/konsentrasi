<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\SentimentController;
use App\Http\Controllers\KomentarController;

Route::post('/analyze', [SentimentController::class, 'analyze'])->name('analyze');
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');
Route::get('/tulis-komentar', [KomentarController::class, 'create'])->name('komentar.create');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Setelah login, arahkan ke dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');