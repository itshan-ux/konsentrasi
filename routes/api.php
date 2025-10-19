<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController_232187;

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController_232187::class, 'index']);       // GET semua post
    Route::post('/', [PostController_232187::class, 'store']);      // POST buat post
    Route::get('/{id}', [PostController_232187::class, 'show']);    // GET detail post
    Route::put('/{id}', [PostController_232187::class, 'update']);  // PUT update post
    Route::delete('/{id}', [PostController_232187::class, 'destroy']); // DELETE post

    // Analisis sentimen untuk posting tertentu
    Route::post('/{id}/analyze', [PostController_232187::class, 'analyze']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
