<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #f7f7f7, #f1f1f1);
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .floating-shapes {
            position: absolute;
            top: 0; left: 0;
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

        .floating-shapes span:nth-child(1) { left: 25%; width: 40px; height: 40px; animation-delay: 0s; }
        .floating-shapes span:nth-child(2) { left: 10%; animation-delay: 2s; animation-duration: 12s; }
        .floating-shapes span:nth-child(3) { left: 70%; width: 60px; height: 60px; animation-delay: 4s; }
        .floating-shapes span:nth-child(4) { left: 40%; width: 25px; height: 25px; animation-delay: 0s; animation-duration: 18s; }
        .floating-shapes span:nth-child(5) { left: 65%; animation-delay: 0s; }
        .floating-shapes span:nth-child(6) { left: 75%; width: 35px; height: 35px; animation-delay: 3s; }
        .floating-shapes span:nth-child(7) { left: 35%; width: 50px; height: 50px; animation-delay: 7s; }

        @keyframes move {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-800px) rotate(360deg); opacity: 0; }
        }

        .content {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 20px;
            padding: 50px;
            margin: 80px auto;
            max-width: 900px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2 {
            font-weight: 700;
            margin-bottom: 20px;
            color: #c9302c;
        }

        p {
            color: #555;
            line-height: 1.7;
            text-align: justify;
        }

        .highlight {
            color: #c9302c;
            font-weight: 600;
        }

        .btn-back {
            display: inline-block;
            background-color: #c9302c;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 30px;
            padding: 10px 25px;
            text-decoration: none;
            transition: 0.3s;
            margin-bottom: 30px;
        }

        .btn-back:hover {
            background-color: #a52825;
            color: #fff;
        }

        footer {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <!-- Animasi background -->
    <div class="floating-shapes">
        <span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
    </div>

    <!-- Konten -->
    <div class="container content">
        <a href="{{ url('/dashboard') }}" class="btn-back">← Kembali ke Dashboard</a>

        <h2>Tentang Sistem Analisis Sentimen Media Sosial</h2>
        <p>
            Sistem ini dikembangkan untuk menganalisis opini atau sentimen pengguna media sosial seperti
            <span class="highlight">Instagram, Twitter(x), Facebook</span>, dan platform lainnya. Dengan menggunakan algoritma
            <span class="highlight">Naive Bayes</span>, sistem dapat mengklasifikasikan komentar menjadi
            <b>positif</b>, <b>negatif</b>, atau <b>netral</b>.
        </p>

        <p>
            Tujuan utama sistem ini adalah membantu pihak tertentu seperti <b>peneliti</b>, <b>pemerintah</b>, atau <b>perusahaan</b>
            untuk memahami opini publik terhadap suatu topik, produk, atau kebijakan dengan cepat dan akurat.
        </p>

        <p>
            Algoritma <b>Naive Bayes</b> bekerja dengan menghitung probabilitas kemunculan kata dalam setiap kategori sentimen.
            Meskipun sederhana, metode ini terbukti efektif dalam klasifikasi teks berbahasa Indonesia.
        </p>

        <p>
            Sistem ini dirancang dengan antarmuka yang <b>modern, ringan, dan interaktif</b>, sehingga pengguna dapat melihat
            hasil analisis dalam bentuk data numerik maupun visual (grafik sentimen dan tren komentar).
        </p>

        <footer>
            © 2025 Sistem Analisis Sentimen Media Sosial — Dibuat untuk keperluan penelitian & pembelajaran.
        </footer>
    </div>
</body>
</html>
