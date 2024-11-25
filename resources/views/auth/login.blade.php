<!DOCTYPE html>
<html lang="es">
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

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #FF6A95, #FF7F50); /* Degradado de rosa y coral */
            background-size: cover;
            background-position: center;
            color: #fff;
            overflow: hidden;
        }

        /*------------------------------------- FORMULARIO  ------------------------------------- */
        .caja {
            width: 420px;
            background: rgba(0, 0, 0, 0.7); /* Fondo oscuro para contrastar */
            color: #fff;
            border-radius: 1.5rem;
            padding: 3rem 4rem;
            border: 2px solid #FF6347; /* Rojo tomate */
            box-shadow: 0 0 20px rgba(255, 99, 71, 0.7);
            backdrop-filter: blur(10px);
            position: relative;
        }

        .caja h1 {
            font-size: 36px;
            text-align: center;
            letter-spacing: 1.2rem;
            margin-bottom: 20px;
            color: #FFD700; /* Dorado */
        }

        .input-box {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: 2px solid #FFD700; /* Dorado */
            color: #fff;
            font-size: 16px;
            border-radius: 40px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .input-box input:focus {
            outline: none;
            border-color: #FF6347; /* Rojo tomate */
            box-shadow: 0 0 10px rgba(255, 99, 71, 0.5);
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .btn {
            width: 100%;
            background: #FF6347; /* Rojo tomate */
            border: none;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            padding: 0.7rem;
            letter-spacing: 3px;
            transition: all 0.4s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #FF4500; /* Naranja rojizo */
            box-shadow: 0 0 15px rgba(255, 69, 0, 0.5);
            color: #fff;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .remember-forgot a {
            color: #FFD700; /* Dorado */
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .register-link {
            font-size: 14.5px;
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #FFD700; /* Dorado */
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
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
<body>
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
