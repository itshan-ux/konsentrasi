<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #f7f7f7, #f1f1f1);
            overflow-x: hidden;
            min-height: 100vh;
        }

        .floating-shapes {
            position: absolute; top: 0; left: 0;
            width: 100%; height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .floating-shapes span {
            position: absolute;
            display: block;
            width: 20px; height: 20px;
            background: rgba(255, 0, 0, 0.1);
            animation: move 25s linear infinite;
            bottom: -150px;
        }

        .floating-shapes span:nth-child(1){ left:25%;width:40px;height:40px;animation-delay:0s;}
        .floating-shapes span:nth-child(2){ left:10%;animation-delay:2s;animation-duration:12s;}
        .floating-shapes span:nth-child(3){ left:70%;width:60px;height:60px;animation-delay:4s;}
        .floating-shapes span:nth-child(4){ left:40%;width:25px;height:25px;animation-delay:0s;animation-duration:18s;}
        .floating-shapes span:nth-child(5){ left:65%;animation-delay:0s;}
        .floating-shapes span:nth-child(6){ left:75%;width:35px;height:35px;animation-delay:3s;}
        .floating-shapes span:nth-child(7){ left:35%;width:50px;height:50px;animation-delay:7s;}

        @keyframes move {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-800px) rotate(360deg); opacity: 0; }
        }

        .navbar { background-color: #c9302c; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 600; }
        .btn-logout { background: white; color: #c9302c; font-weight: 600; border: none; padding: 6px 15px; border-radius: 8px; }
        .btn-logout:hover { background-color: #c9302c; color: #fff; transition: 0.3s; }

        .dashboard-container {
            position: relative;
            z-index: 2;
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 40px;
            margin-top: 60px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .dashboard-card {
            background-color: #f9f9f9;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform .2s;
        }
        .dashboard-card:hover { transform: scale(1.05); }
        .positive { color: #28a745; }
        .negative { color: #dc3545; }
        .neutral { color: #6c757d; }
    </style>
</head>
<body>

<div class="floating-shapes">
    <span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span>
</div>

<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand" href="#">Dashboard User</a>
    <div class="ms-auto d-flex align-items-center gap-3">
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        <a href="{{ route('komentar.index') }}" class="nav-link">Komentar</a>
        <a href="{{ route('tentang') }}" class="nav-link">Tentang</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>

<div class="container dashboard-container">
    <div class="text-center mb-5">
        <h3>Selamat Datang, {{ Auth::user()->name ?? 'User' }}</h3>
        <p>Sistem Analisis Sentimen Media Sosial — pantau opini publik berdasarkan komentar Anda.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-3">
            <div class="dashboard-card">
                <h4>Total Komentar Anda</h4>
                <h2>{{ $totalKomentar }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <h4>Komentar Positif</h4>
                <h2 class="positive">{{ $komentarPositif }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <h4>Komentar Negatif</h4>
                <h2 class="negative">{{ $komentarNegatif }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <h4>Komentar Netral</h4>
                <h2 class="neutral">{{ $komentarNetral }}</h2>
            </div>
        </div>
    </div>
</div>
</body>
</html>
