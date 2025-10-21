@extends('layouts.user')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow">
    <h2 class="text-2xl font-bold mb-4">Analisis Sentimen</h2>

    <form method="POST" action="{{ route('analisis.store') }}">
        @csrf
        <textarea name="komentar" rows="4" class="w-full border rounded p-2 mb-4" placeholder="Tulis komentar Anda di sini..."></textarea>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Analisis Sekarang</button>
    </form>

    @if(session('hasil'))
        <div class="mt-6 border-t pt-4">
            <h3 class="text-lg font-semibold mb-2">Hasil Analisis:</h3>
            <p>
                Sentimen:
                <span class="font-bold
                    @if(session('hasil')['status'] == 'positif') text-green-600
                    @elseif(session('hasil')['status'] == 'negatif') text-red-600
                    @else text-gray-600
                    @endif">
                    {{ ucfirst(session('hasil')['status']) }}
                </span>
            </p>
            <p>Skor: {{ session('hasil')['skor'] }}</p>
        </div>
    @endif
</div>
@endsection
