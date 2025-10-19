@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5>Tulis Komentar</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('komentar.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="komentar" class="form-label">Komentar Anda:</label>
                <textarea name="komentar" id="komentar" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
    </div>
</div>
@endsection
