@extends('layouts.app')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-96">
        <h2 class="text-2xl font-semibold mb-6 text-center">Daftar Akun Baru</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required autofocus>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border p-2 rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
                Daftar
            </button>
            <p class="text-sm text-center mt-3">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk</a>
            </p>
        </form>
    </div>
</div>
@endsection
