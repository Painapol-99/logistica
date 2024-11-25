<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        /*------------------------------------- GENERAL  ------------------------------------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Teko", sans-serif;
        }

        .bodyLogin {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(180deg, #FF7E5F, #FEB47B); /* Degradado atardecer */
            background-size: cover;
            background-position: center;
        }

        /*------------------------------------- FORMULARIO  ------------------------------------- */
        .caja {
            width: 420px;
            background: transparent;
            color: #fff;
            border-radius: 2rem;
            padding: 3rem 4rem;
            border: 2px solid #155724;
            box-shadow: 0 0 10px #155724;
            backdrop-filter: blur(20px);
        }

        .caja h1 {
            font-size: 36px;
            text-align: center;
            letter-spacing: 1rem;
        }

        .caja .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            box-shadow: 0 0 10px #155724;
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .caja .btn {
            width: 100%;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            padding: 0.5rem;
            letter-spacing: 5px;
            transition: all 0.6s ease;
            margin-bottom: 1rem;
        }

        .btn:hover {
            background-color: #000000;
            box-shadow: 0 0 10px #155724;
            color: #155724;
            border-color: #155724;
        }

        .caja .register-link {
            font-size: 14.5px;
            text-align: center;
            margin-top: 20px 0 15px;
        }

        .register-link p a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        /*------------------------------------- FONDO ESTRELLADO  ------------------------------------- */
        #space {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .star {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            animation: moveStar linear infinite;
        }

        @keyframes moveStar {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="bodyLogin">
    <div id="space"></div>
    <div>
        <div class="caja">
            <h1>Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-box">
                    <input id="email" type="email" name="email" placeholder="Correo electrónico" required autofocus>
                </div>
                <div class="input-box">
                    <input id="password" type="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input id="remember_me" type="checkbox" name="remember">
                        Recuérdame
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>
                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
            <div class="register-link">
                <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
            </div>
        </div>
    </div>
    <script>
        const space = document.getElementById('space');
        const numStars = 1200;

        for (let i = 0; i < numStars; i++) {
            let star = document.createElement('div');
            star.classList.add('star');
            let size = Math.random() * 4.5;
            star.style.width = size + 'px';
            star.style.height = size + 'px';
            star.style.top = Math.random() * 100 + 'vh';
            star.style.left = Math.random() * 100 + 'vw';
            let duration = Math.random() * 5 + 5;
            star.style.animationDuration = duration + 's';
            space.appendChild(star);
        }
    </script>
</body>
</html>
