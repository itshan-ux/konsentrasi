<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentimentController extends Controller
{
    public function analyze(Request $request)
    {
        $text = strtolower($request->input('text'));

        // Naive Bayes sederhana
        $positiveWords = ['bagus', 'senang', 'hebat', 'mantap', 'puas', 'baik'];
        $negativeWords = ['buruk', 'kecewa', 'jelek', 'marah', 'sedih', 'parah'];

        $positiveCount = 0;
        $negativeCount = 0;

        foreach (explode(' ', $text) as $word) {
            if (in_array($word, $positiveWords)) $positiveCount++;
            if (in_array($word, $negativeWords)) $negativeCount++;
        }

        if ($positiveCount > $negativeCount) {
            $result = 'Positif';
        } elseif ($negativeCount > $positiveCount) {
            $result = 'Negatif';
        } else {
            $result = 'Netral';
        }

        return view('dashboard', [
            'input' => $text,
            'result' => $result
        ]);
    }
}
