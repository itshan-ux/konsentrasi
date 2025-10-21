<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(to bottom, #f7f7f7, #f1f1f1); min-height: 100vh; }
        .navbar { background-color: #c9302c; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 600; }
        .btn-logout { background: white; color: #c9302c; font-weight: 600; border: none; padding: 6px 15px; border-radius: 8px; }
        .dashboard-container { background: rgba(255,255,255,0.95); border-radius: 20px; padding: 40px; margin-top: 60px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .dashboard-card { background-color: #f9f9f9; border-radius: 15px; padding: 25px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform .2s; }
        .dashboard-card:hover { transform: scale(1.05); }
        .positive { color: #28a745; } .negative { color: #dc3545; } .neutral { color: #6c757d; }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand" href="#">Dashboard Admin</a>
    <div class="ms-auto d-flex align-items-center gap-3">
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        <a href="{{ route('komentar.index') }}" class="nav-link">Kelola Komentar</a>
        <a href="{{ route('tentang') }}" class="nav-link">Tentang</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>

<div class="container dashboard-container">
    <div class="text-center mb-5">
        <h3>Selamat Datang, Admin {{ Auth::user()->name ?? '' }}</h3>
        <p>Pantau hasil analisis sentimen dari seluruh pengguna.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-3">
            <div class="dashboard-card">
                <h4>Total Komentar</h4>
                <h2>{{ $totalKomentar }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <h4>Positif</h4>
                <h2 class="positive">{{ $komentarPositif }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <h4>Negatif</h4>
                <h2 class="negative">{{ $komentarNegatif }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <h4>Netral</h4>
                <h2 class="neutral">{{ $komentarNetral }}</h2>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <h5 class="text-center mb-3">Komentar Terbaru</h5>
    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-danger">
                <tr>
                    <th>#</th>
                    <th>Nama Pengguna</th>
                    <th>Komentar</th>
                    <th>Sentimen</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentKomentar as $index => $komentar)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $komentar->user->name_232187 ?? 'Guest' }}</td>
                        <td>{{ $komentar->komentar }}</td>
                        <td>
                            <span class="badge
                                @if($komentar->status_sentimen === 'positif') bg-success
                                @elseif($komentar->status_sentimen === 'negatif') bg-danger
                                @else bg-secondary @endif">
                                {{ ucfirst($komentar->status_sentimen) }}
                            </span>
                        </td>
                        <td>{{ $komentar->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
