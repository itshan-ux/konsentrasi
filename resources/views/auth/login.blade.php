<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(180deg, #e3e3e3, #c7c7c7);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Rubik', sans-serif;
        }

        .login-box {
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            width: 380px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            text-align: center;
        }

        .login-logo {
            font-size: 26px;
            font-weight: 700;
            color: #ff3333;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        .login-logo span {
            color: #000;
        }

        .form-control {
            background: #f6f6f6;
            border: 2px solid #ccc;
            border-radius: 8px;
            color: #333;
            font-size: 14px;
            padding: 12px;
            margin-bottom: 16px;
            transition: border 0.2s;
        }

        .form-control:focus {
            border-color: #ff3333;
            box-shadow: none;
            background: #fff;
        }

        .btn-login {
            background: #ff3333;
            color: #fff;
            border: none;
            font-weight: 700;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            letter-spacing: 0.5px;
            transition: all 0.2s ease-in-out;
        }

        .btn-login:hover {
            background: #e02727;
            transform: translateY(-1px);
        }

        .footer-text {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }

        /* Roblox background floating cubes */
        .bg-cubes {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            background: linear-gradient(180deg, #efefef, #d6d6d6);
        }

        .cube {
            position: absolute;
            width: 30px;
            height: 30px;
            background: rgba(255, 51, 51, 0.15);
            transform: rotate(45deg);
            animation: float 12s infinite ease-in-out;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(45deg); opacity: 1; }
            100% { transform: translateY(-100vh) rotate(90deg); opacity: 0; }
        }
    </style>
</head>
<body>

<div class="bg-cubes" id="cube-bg"></div>

<div class="login-box">
    <div class="login-logo">ANALISIS<span>SENTIMEN</span></div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button type="submit" class="btn-login">Login</button>
    </form>

    <div class="footer-text">
        
    </div>
</div>

<script>
    // Floating cube animation background
    const cubeBg = document.getElementById('cube-bg');
    for (let i = 0; i < 15; i++) {
        const cube = document.createElement('div');
        cube.classList.add('cube');
        cube.style.left = Math.random() * 100 + 'vw';
        cube.style.top = Math.random() * 100 + 'vh';
        cube.style.animationDelay = Math.random() * 10 + 's';
        cube.style.width = cube.style.height = Math.random() * 30 + 20 + 'px';
        cubeBg.appendChild(cube);
    }
</script>

</body>
</html>
