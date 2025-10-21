<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">💬 Daftar Komentar</h2>
            <div>
                <a href="{{ route('komentar.create') }}" class="btn btn-light me-2">Tulis Komentar</a>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary me-2">Kembali ke Dashboard</a>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($komentar->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada komentar 😢 <br>
                <a href="{{ route('komentar.create') }}" class="btn btn-primary mt-2">Tulis Komentar Sekarang</a>
            </div>
        @else
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Status Sentimen</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($komentar as $index => $k)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $k->nama }}</td>
                                    <td>{{ $k->isi }}</td>
                                    <td>
                                        @if ($k->status_sentimen === 'positif')
                                            <span class="badge bg-success">Positif</span>
                                        @elseif ($k->status_sentimen === 'negatif')
                                            <span class="badge bg-danger">Negatif</span>
                                        @else
                                            <span class="badge bg-secondary">Netral</span>
                                        @endif
                                    </td>
                                    <td>{{ $k->created_at->format('d M Y, H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

</body>
</html>
