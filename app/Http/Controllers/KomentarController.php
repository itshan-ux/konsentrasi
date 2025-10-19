<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    // 🔹 Menampilkan halaman komentar (admin atau user)
    public function index()
    {
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            // Jika admin → tampilkan semua komentar
            $komentars = Komentar::with('user')->latest()->get();
            return view('admin.komentar', compact('komentars'));
        } else {
            // Jika user biasa → tampilkan komentar miliknya
            $komentars = Komentar::where('user_id', Auth::id())->latest()->get();
            return view('user.daftar_komentar', compact('komentars'));
        }
    }

    // 🔹 Menampilkan form tulis komentar (user)
    public function create()
    {
        return view('user.komentar');
    }

    // 🔹 Menyimpan komentar baru
    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string|max:500',
        ]);

        Komentar::create([
            'user_id' => Auth::id(),
            'komentar' => $request->komentar,
            'status_sentimen' => null, // nanti bisa diisi setelah analisis
        ]);

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil dikirim!');
    }
}
