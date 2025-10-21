@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4 text-gray-800">Data Hasil Analisis Pengguna</h1>

    <div class="bg-white p-6 rounded-2xl shadow-md">
        <table class="w-full border-collapse border border-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Nama Pengguna</th>
                    <th class="border p-2">Teks</th>
                    <th class="border p-2">Sentimen</th>
                    <th class="border p-2">Skor</th>
                    <th class="border p-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($analisis as $i => $item)
                <tr>
                    <td class="border p-2 text-center">{{ $i + 1 }}</td>
                    <td class="border p-2">{{ $item->user->name }}</td>
                    <td class="border p-2">{{ Str::limit($item->teks, 40) }}</td>
                    <td class="border p-2 text-center">
                        <span class="@if($item->sentimen == 'Positif') text-green-600 
                                     @elseif($item->sentimen == 'Negatif') text-red-600 
                                     @else text-yellow-500 @endif font-medium">
                            {{ $item->sentimen }}
                        </span>
                    </td>
                    <td class="border p-2 text-center">{{ $item->skor }}</td>
                    <td class="border p-2 text-center">{{ $item->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 p-3">Belum ada data analisis</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
