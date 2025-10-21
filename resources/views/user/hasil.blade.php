@extends('layouts.user')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4 text-gray-800">Hasil Analisis Sentimen</h1>

    <div class="bg-white p-6 rounded-2xl shadow-md">
        <p class="text-gray-600 mb-2">Teks yang dianalisis:</p>
        <div class="p-4 bg-gray-50 border rounded mb-4">
            <p class="text-gray-800">{{ $komentar ?? 'Tidak ada teks yang dianalisis.' }}</p>
        </div>

        <h2 class="text-lg font-semibold text-gray-700 mb-2">Hasil:</h2>
        <div class="p-4 border rounded-lg">
            <p class="text-gray-700">Kategori Sentimen: 
                <span class="@if($sentimen == 'Positif') text-green-600 
                             @elseif($sentimen == 'Negatif') text-red-600 
                             @else text-yellow-500 @endif font-semibold">
                    {{ $sentimen ?? 'Belum dianalisis' }}
                </span>
            </p>
            <p class="text-gray-600 mt-1">Skor Sentimen: {{ $skor ?? '-' }}</p>
        </div>

        <div class="flex justify-end mt-6 gap-3">
            <a href="{{ route('user.analisis') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Analisis Lagi
            </a>
            <a href="{{ route('user.dashboard') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
