<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('api')->group(function () {
Route::get('/posts', [PostController::class, 'index']);
});
