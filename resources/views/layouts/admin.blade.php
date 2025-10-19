<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Dashboard Admin</a>
    <div>
        <a href="{{ route('dashboard') }}" class="btn btn-light me-2">Dashboard</a>
        <a href="{{ route('komentar.index') }}" class="btn btn-warning me-2">Komentar</a>
        <a href="{{ route('tentang') }}" class="btn btn-light me-2">Tentang</a>
        <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
    </div>
  </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

</body>
</html>
