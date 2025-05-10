<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Pengambilan data postingan dari database table posts
        // Menggunakan Eloquent ORM untuk mengambil semua data postingan
        $posts = Post::all();

        // Mengembalikan response JSON dengan data postingan
        return response()->json($posts);
    }
}
