@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4 text-gray-800">Pengaturan Sistem</h1>

    <div class="bg-white p-6 rounded-2xl shadow-md max-w-xl">
        <form action="{{ route('admin.updateSettings') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">API Key Analisis Sentimen</label>
                <input type="text" name="api_key" value="{{ $settings->api_key ?? '' }}" 
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Threshold Positif</label>
                <input type="number" step="0.01" name="threshold_positive" value="{{ $settings->threshold_positive ?? 0.6 }}"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Threshold Negatif</label>
                <input type="number" step="0.01" name="threshold_negative" value="{{ $settings->threshold_negative ?? 0.4 }}"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Simpan Pengaturan
            </button>
        </form>
    </div>
</div>
@endsection
