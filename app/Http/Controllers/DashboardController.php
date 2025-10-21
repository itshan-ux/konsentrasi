<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar_232187;

class DashboardController extends Controller
{
    public function index()
    {
        
        $totalKomentar = Komentar_232187::count();
        $komentarPositif = Komentar_232187::where('status_sentimen', 'positif')->count();
        $komentarNegatif = Komentar_232187::where('status_sentimen', 'negatif')->count();
        $komentarNetral = Komentar_232187::where('status_sentimen', 'netral')->count();

        return view('dashboard', compact(
            'totalKomentar',
            'komentarPositif',
            'komentarNegatif',
            'komentarNetral'
        ));
    }
}
