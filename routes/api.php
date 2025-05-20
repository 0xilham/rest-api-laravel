<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**
* Rute API untuk mengelola postingan.
*
* Dikelompokkan di bawah prefix 'api', rute-rute ini menyediakan endpoint untuk:
* - Mengambil daftar semua postingan (GET /api/posts)
* - Mengambil satu postingan berdasarkan ID (GET /api/posts/{id})
* - Membuat postingan baru (POST /api/posts)
* - Memperbarui postingan berdasarkan ID (PUT /api/posts/{id})
* - Menghapus postingan berdasarkan ID (DELETE /api/posts/{id})
*
* Semua rute ditangani oleh PostController.
*/


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::post('/posts', [PostController::class, 'store']);

Route::put('/posts/{id}', [PostController::class, 'update']);

Route::delete('/posts/{id}', [PostController::class, 'destroy']);

