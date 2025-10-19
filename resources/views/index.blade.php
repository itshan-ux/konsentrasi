<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Komentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4">📋 Daftar Komentar</h3>

    <!-- Form Tambah Komentar -->
    <form action="{{ route('komentar.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label>Nama User</label>
            <input type="text" name="user" class="form-control" placeholder="Masukkan nama Anda" required>
        </div>
        <div class="mb-3">
            <label>Komentar</label>
            <textarea name="komentar" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
    </form>

    <!-- Tabel Daftar Komentar -->
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
            @forelse($komentars as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $k->user }}</td>
                    <td>{{ $k->komentar }}</td>
                    <td>{{ $k->status_sentimen }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada komentar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
