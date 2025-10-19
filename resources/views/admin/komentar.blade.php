@extends('layouts.admin')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
        <h5>Daftar Komentar dan Status Analisis</h5>
    </div>
    <div class="card-body">
        @if($komentar->isEmpty())
            <p class="text-center text-muted">Belum ada komentar.</p>
        @else
        <table class="table table-bordered table-striped">
            <thead class="table-danger text-center">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Komentar</th>
                    <th>Status Sentimen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($komentar as $index => $k)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $k->user->name ?? 'Anonim' }}</td>
                        <td>{{ $k->komentar }}</td>
                        <td>{{ $k->status_sentimen ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
