@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <h1 class="text-6xl font-bold text-red-600 mb-4">403</h1>
    <p class="text-lg text-gray-700 mb-6">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <a href="{{ url('/') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Kembali ke Halaman Utama
    </a>
</div>
@endsection
