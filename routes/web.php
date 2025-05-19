<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});


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

Route::prefix('api')->group(function () {
// Route to retrieve a list of all posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::post('/posts', [PostController::class, 'store']);

Route::put('/posts/{id}', [PostController::class, 'update']);

Route::delete('/posts/{id}', [PostController::class, 'destroy']);
});
