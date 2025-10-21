<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar_232187;
use App\Models\Badword; // Hanya jika pakai database badword
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    // Menampilkan semua komentar
    public function index()
    {
        $komentars = Komentar_232187::with('user')->latest()->get();
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return view('admin.komentar', compact('komentars'));
        } else {
            return view('user.komentar', compact('komentars'));
        }
    }

    // Menyimpan komentar + analisis sentimen otomatis
    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string|max:500',
        ]);

        // Hitung status sentimen
        $status_sentimen = $this->analisisSentimen($request->komentar);

        // Simpan komentar
        $komentar = Komentar_232187::create([
            'user_id' => Auth::id(),
            'komentar' => $request->komentar,
            'status_sentimen' => $status_sentimen
        ]);

        return redirect('/komentar')->with('Berhasil input');
    }

    // Fungsi bantu analisis sentimen + badword filter
    private function analisisSentimen($text)
    {
        $positifWords = ['baik', 'bagus', 'senang', 'suka', 'mantap', 'puas', 'hebat', 'terbaik'];
        $negatifWords = ['buruk', 'jelek', 'marah', 'kecewa', 'sedih', 'benci', 'parah'];

        // Hardcode badword filter (atau bisa ambil dari DB)
        $badwordNegatif = ['bodoh', 'goblok', 'anjing', 'kampungan', 'tolol'];
        $badwordPositif = ['hebat', 'luar biasa', 'mantap jiwa'];

        // Lowercase & hapus tanda baca
        $text = strtolower($text);
        $text = str_replace([',', '.', '!', '?'], '', $text);

        // Score biasa
        $score = 0;
        foreach ($positifWords as $word) {
            if (str_contains($text, $word)) $score++;
        }
        foreach ($negatifWords as $word) {
            if (str_contains($text, $word)) $score--;
        }

        // Cek badword negatif → langsung negatif
        foreach ($badwordNegatif as $word) {
            if (str_contains($text, $word)) return 'negatif';
        }

        // Cek badword positif → langsung positif
        foreach ($badwordPositif as $word) {
            if (str_contains($text, $word)) return 'positif';
        }

        // Score normal
        if ($score > 0) return 'positif';
        if ($score < 0) return 'negatif';
        return 'netral';
    }
}
