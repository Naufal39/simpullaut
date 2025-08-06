<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Menangani upload gambar
    public function uploadImage(Request $request)
    {
        // Validasi file gambar
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan gambar dan mendapatkan path-nya
        $image = $request->file('file');
        $imagePath = $image->store('images', 'public');

        // Membuat URL gambar yang dapat diakses
        $imageUrl = Storage::url($imagePath);

        // Mengembalikan URL gambar untuk disisipkan di Trix
        return response()->json(['url' => $imageUrl]);
    }

    // Menampilkan form untuk membuat post baru
    public function create()
    {
        return view('posts.create');
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Menyimpan konten post yang berisi teks dan gambar
        Post::create([
            'title' => $request->title,
            'content' => $request->content,  // Konten dari Trix Editor
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat');
    }

    // Menampilkan semua post
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }


    // Menampilkan detail post berdasarkan ID
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        // Menemukan post berdasarkan ID dan menampilkan halaman edit
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Menemukan post berdasarkan ID dan memperbarui data
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menemukan post berdasarkan ID dan menghapusnya
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus');
    }
}
