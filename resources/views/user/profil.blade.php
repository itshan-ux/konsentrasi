@extends('layouts.user')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4 text-gray-800">Profil Pengguna</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-lg font-semibold mb-3 text-gray-700">Data Akun</h2>
            <p><span class="font-semibold text-gray-700">Nama:</span> {{ Auth::user()->name }}</p>
            <p><span class="font-semibold text-gray-700">Email:</span> {{ Auth::user()->email }}</p>
            <p><span class="font-semibold text-gray-700">Tanggal Bergabung:</span> {{ Auth::user()->created_at->format('d M Y') }}</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-lg font-semibold mb-3 text-gray-700">Histori Analisis</h2>
            <table class="w-full border-collapse border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">No</th>
                        <th class="border p-2">Teks</th>
                        <th class="border p-2">Sentimen</th>
                        <th class="border p-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $index => $data)
                    <tr>
                        <td class="border p-2 text-center">{{ $index + 1 }}</td>
                        <td class="border p-2">{{ Str::limit($data->teks, 30) }}</td>
                        <td class="border p-2 text-center">
                            <span class="@if($data->sentimen == 'Positif') text-green-600 
                                         @elseif($data->sentimen == 'Negatif') text-red-600 
                                         @else text-yellow-500 @endif font-medium">
                                {{ $data->sentimen }}
                            </span>
                        </td>
                        <td class="border p-2 text-center">{{ $data->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 p-3">Belum ada histori analisis</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
