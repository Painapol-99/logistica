<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        /* General */
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
            background: linear-gradient(180deg, #F27059, #FFD194); /* Fondo atardecer */
            color: #ffffff;
        }

        #space {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .star {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.7);
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

        /* Caja */
        .caja {
            position: relative;
            z-index: 2;
            width: 400px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        .caja h1 {
            font-size: 2rem;
            text-align: center;
            color: #FFDDC1;
            margin-bottom: 1rem;
            letter-spacing: 0.1rem;
        }

        .input-box {
            position: relative;
            width: 100%;
            margin: 1rem 0;
        }

        .input-box input {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            outline: none;
            transition: background-color 0.3s ease;
        }

        .input-box input::placeholder {
            color: #CCCCCC;
        }

        .input-box input:focus {
            background: rgba(255, 255, 255, 0.2);
        }

        .link-login {
            display: block;
            margin-top: 1rem;
            text-align: center;
            color: #FFD194;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .link-login:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            background: #FFDDC1;
            color: #333333;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            letter-spacing: 0.05rem;
            margin-top: 1rem;
        }

        .btn:hover {
            background: #FFD194;
            color: #333333;
        }
    </style>
</head>
<body>
    <div id="space"></div> <!-- Fondo estrellado -->
    <div class="caja">
        <h1>Registro</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Nombre -->
            <div class="input-box">
                <input id="name" type="text" name="name" placeholder="Nombre Completo" value="{{ old('name') }}" required autofocus>
            </div>

            <!-- Email -->
            <div class="input-box">
                <input id="email" type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
            </div>

            <!-- Contraseña -->
            <div class="input-box">
                <input id="password" type="password" name="password" placeholder="Contraseña" required>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="input-box">
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            </div>

            <!-- Botón -->
            <button type="submit" class="btn">Registrar</button>
        </form>

        <!-- Enlace para iniciar sesión -->
        <a href="{{ route('login') }}" class="link-login">¿Ya tienes cuenta? Inicia Sesión</a>
    </div>

    <script>
        const space = document.getElementById('space');
        const numStars = 1000;

        for (let i = 0; i < numStars; i++) {
            let star = document.createElement('div');
            star.classList.add('star');

            // Tamaño y posición de estrella aleatorios
            let size = Math.random() * 3;
            star.style.width = size + 'px';
            star.style.height = size + 'px';
            star.style.top = Math.random() * 100 + 'vh';
            star.style.left = Math.random() * 100 + 'vw';

            // Duración de animación
            let duration = Math.random() * 5 + 3;
            star.style.animationDuration = duration + 's';

            space.appendChild(star);
        }
    </script>
</body>
</html>
