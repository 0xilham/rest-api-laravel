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
    public function show($id)
    {
        // Mengambil postingan berdasarkan ID
        $post = Post::find($id);

        // Jika postingan tidak ditemukan, kembalikan response 404
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        // Mengembalikan response JSON dengan data postingan
        return response()->json($post);
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'news_content' => 'required|string',
            'author' => 'required|integer|exists:users,id',
        ]);

        // Membuat postingan baru dengan data yang divalidasi
        $post = Post::create($validatedData);

        // Mengembalikan response JSON dengan data postingan yang baru dibuat
        return response()->json($post, 201);
    }
    public function update(Request $request, $id)
    {
        // Mengambil postingan berdasarkan ID
        $post = Post::find($id);

        // Jika postingan tidak ditemukan, kembalikan response 404
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'news_content' => 'sometimes|required|string',
            'author' => 'sometimes|required|integer|exists:users,id',
        ]);

        // Memperbarui postingan dengan data yang divalidasi
        $post->update($validatedData);

        // Mengembalikan response JSON dengan data postingan yang diperbarui
        return response()->json($post);
    }
    public function destroy($id)
    {
        // Mengambil postingan berdasarkan ID
        $post = Post::find($id);

        // Jika postingan tidak ditemukan, kembalikan response 404
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        // Menghapus postingan
        $post->delete();

        // Mengembalikan response JSON dengan pesan sukses
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
