<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal - LogFood</title>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-fondo-1: #0000FF; /* Changed to blue */
            --color-fondo-2: #ADD8E6; /* Changed to light blue */
            --color-texto-principal: #FFF5EE;
            --color-secundario: #FFDDC1;
            --color-hover: #FFD194;
            --color-dark: rgba(0, 0, 0, 0.7);
            --color-shadow: rgba(0, 0, 0, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Teko", sans-serif;
        }

        body {
            background: linear-gradient(180deg, var(--color-fondo-1), var(--color-fondo-2));
            color: var(--color-texto-principal);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            font-size: 16px;
            overflow-x: hidden;
        }

        header {
            width: 100%;
            background-color: var(--color-dark);
            padding: 1rem 0;
            text-align: center;
            box-shadow: 0 4px 10px var(--color-shadow);
        }

        header .logo {
            width: 200px;
            margin-bottom: 0.5rem;
        }

        header p {
            font-size: 2rem;
            color: var(--color-texto-principal);
            font-family: 'Amatic SC', sans-serif;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin-top: 1rem;
        }

        nav ul li {
            margin: 0 1.5rem;
        }

        nav ul li a {
            color: var(--color-texto-principal);
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: var(--color-hover);
        }

        .hero {
            text-align: center;
            padding: 3rem;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7);
            width: 100%;
            max-width: 800px;
            margin: 4rem auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: var(--color-secundario);
            font-family: 'Sofadi One', sans-serif;
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            color: var(--color-hover);
        }

        .hero-buttons a {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            background: var(--color-secundario);
            color: #333;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            margin: 0 1rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .hero-buttons a:hover {
            background: var(--color-hover);
            color: #333;
        }

        .carac {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding: 4rem 1rem;
            max-width: 1200px;
        }

        .caja {
            background: var(--color-dark);
            padding: 3rem;
            border-radius: 16px;
            box-shadow: 0 8px 20px var(--color-shadow);
            width: 30%;
            margin-bottom: 2rem;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .caja:hover {
            transform: scale(1.05);
        }

        .caja h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--color-secundario);
        }

        .caja p {
            color: var(--color-hover);
            font-size: 1.1rem;
        }

        footer {
            width: 100%;
            text-align: center;
            margin-top: 3rem;
            padding: 1rem;
            color: var(--color-secundario);
            background-color: var(--color-dark);
            box-shadow: 0 -4px 10px var(--color-shadow);
        }

        #space {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
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

    <header>
        <img class="logo" src="{{ asset('logocamion.png') }}" alt="LogFood Logo">
        <p>LogFood</p>
        <nav>
            <ul>
              <li><a href="{{ url('/') }}">Inicio</a></li>
              <li><a href="{{ url('/about') }}">Sobre Nosotros</a></li>
              <li><a href="{{ url('/productos') }}">Productos</a></li>

              @auth
                <li><a href="{{ route('profile.edit') }}">Usuario</a></li>
                <li><a href="{{ route('carrito.mostrar') }}">Carrito</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: var(--color-texto-principal); font-weight: bold; font-size: 1.2rem; cursor: pointer; padding: 0; margin: 0;">Cerrar Sesión</button>
                    </form>
                </li>
              @endauth
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1>Bienvenido a LogFood</h1>
            <p>Optimiza tus repartos con nuestra aplicación.</p>
            <div class="hero-buttons">
                <a href="{{ url('/productos') }}">Ver Productos</a>
                <a href="{{ url('/compras') }}">Comprar</a>
            </div>
        </section>

        <section class="carac">
            <div class="caja">
                <h3>Gestión Eficiente</h3>
                <p>Organiza tus pedidos de manera rápida y precisa.</p>
            </div>
            <div class="caja">
                <h3>Seguimiento en Tiempo Real</h3>
                <p>Monitorea el estado de tus entregas al instante.</p>
            </div>
            <div class="caja">
                <h3>Soporte 24/7</h3>
                <p>Estamos disponibles para ayudarte en cualquier momento.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>

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
