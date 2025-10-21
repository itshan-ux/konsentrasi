<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komentar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #f7f7f7, #f1f1f1);
            min-height: 100vh;
        }
        .navbar { background-color: #c9302c; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 600; }
        .btn-logout {
            background: white;
            color: #c9302c;
            font-weight: 600;
            border: none;
            padding: 6px 15px;
            border-radius: 8px;
        }
        .content-container {
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 40px;
            margin-top: 60px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .section-title {
            background-color: #c9302c;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
        }
        .komentar-card {
            border-radius: 12px;
            background: #f9f9f9;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            padding: 15px 20px;
        }
        .badge {
            font-size: 0.85rem;
            padding: 6px 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand" href="#">SentimenApp</a>
    <div class="ms-auto d-flex align-items-center gap-3">
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>

<div class="container content-container">
    <h4 class="section-title mb-4">Komentar Terbaru</h4>

    <div class="mb-5">
        @forelse($komentars as $komentar)
            <div class="komentar-card mb-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <strong>{{ $komentar->user->name ?? 'Anonim' }}</strong>
                        <p class="mb-2">{{ $komentar->komentar }}</p>
                        @php
                            $status = $komentar->status_sentimen ?? 'netral';
                        @endphp
                        <span class="badge 
                            @if($status === 'positif') bg-success
                            @elseif($status === 'negatif') bg-danger
                            @else bg-secondary
                            @endif">
                            {{ ucfirst($status) }}
                        </span>
                    </div>
                    <small class="text-muted">{{ $komentar->created_at->format('d M Y H:i') }}</small>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">Belum ada komentar.</p>
        @endforelse
    </div>

    <h4 class="section-title mb-3">Tulis Komentar</h4>

    <form action="{{ route('komentar.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar Anda:</label>
            <textarea name="komentar" id="komentar" rows="3" class="form-control" placeholder="Tulis komentar..."></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Kirim</button>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">Kembali ke Dashboard</a>
        </div>
    </form>
</div>
</body>
</html>
