<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Analisis Sentimen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">SentimenApp</a>
    <div>
        <a href="/dashboard" class="btn btn-outline-light me-2">Dashboard</a>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

</body>
</html>
