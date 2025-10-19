<?php

namespace App\Http\Controllers;

use App\Models\Post_232187;
use App\Models\Sentiment_232187;
use Illuminate\Http\Request;

class PostController_232187 extends Controller
{
    // 🔹 Ambil semua posting
    public function index()
    {
        $posts = Post_232187::with('sentiment')->get();
        return response()->json($posts);
    }

    // 🔹 Simpan posting baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform_id_232187' => 'required|integer',
            'user_name_232187'   => 'required|string',
            'content_232187'     => 'required|string',
        ]);

        $post = Post_232187::create($validated);

        return response()->json([
            'message' => 'Post berhasil dibuat',
            'data'    => $post,
        ], 201);
    }

    // 🔹 Tampilkan detail posting
    public function show($id)
    {
        $post = Post_232187::with('sentiment')->findOrFail($id);
        return response()->json($post);
    }

    // 🔹 Update posting
    public function update(Request $request, $id)
    {
        $post = Post_232187::findOrFail($id);
        $post->update($request->only(['user_name_232187', 'content_232187']));
        return response()->json([
            'message' => 'Post berhasil diupdate',
            'data'    => $post,
        ]);
    }

    // 🔹 Hapus posting
    public function destroy($id)
    {
        $post = Post_232187::findOrFail($id);
        $post->delete();
        return response()->json(['message' => 'Post berhasil dihapus']);
    }

    // 🔹 Tambahkan analisis sentimen ke posting
    public function analyze(Request $request, $postId)
    {
        $validated = $request->validate([
            'sentiment_label_232187' => 'required|string',
            'sentiment_score_232187' => 'required|numeric',
        ]);

        $post = Post_232187::findOrFail($postId);

        $sentiment = Sentiment_232187::updateOrCreate(
            ['post_id_232187' => $post->id_232187],
            [
                'sentiment_label_232187' => $validated['sentiment_label_232187'],
                'sentiment_score_232187' => $validated['sentiment_score_232187'],
                'analyzed_at_232187'     => now(),
            ]
        );

        return response()->json([
            'message' => 'Analisis sentimen berhasil ditambahkan',
            'data'    => $sentiment,
        ]);
    }
}
