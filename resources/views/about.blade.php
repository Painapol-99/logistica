<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - LogFood</title>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-fondo-1: #FF6F61;
            --color-fondo-2: #FFD194;
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
            justify-content: space-between; /* Empuja el footer al final */
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

        .logout-button {
            background: none;
            border: none;
            color: var(--color-texto-principal);
            font-weight: bold;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0;
            margin: 0;
        }

        .container {
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

        .container h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: var(--color-secundario);
            font-family: 'Sofadi One', sans-serif;
        }

        .container p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            color: var(--color-hover);
        }

        footer {
            width: 100%;
            text-align: center;
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
    <div id="space" aria-hidden="true"></div>

    <!-- Header -->
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
                        <button type="submit" class="logout-button">Cerrar Sesión</button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <section class="container">
            <h1>Sobre Nosotros</h1>
            <p><strong>Correo:</strong> contacto@logfood.com</p>
            <p><strong>Teléfono:</strong> +34 123 456 789</p>
            <p><strong>Dirección:</strong> Calle Falsa 123, 28080 Madrid, España</p>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const space = document.getElementById('space');
            const numStars = 300;
            const fragment = document.createDocumentFragment();

            for (let i = 0; i < numStars; i++) {
                const star = document.createElement('div');
                star.classList.add('star');
                const size = Math.random() * 3;
                Object.assign(star.style, {
                    width: `${size}px`,
                    height: `${size}px`,
                    top: `${Math.random() * 100}vh`,
                    left: `${Math.random() * 100}vw`,
                    animationDuration: `${Math.random() * 7 + 3}s`,
                });
                fragment.appendChild(star);
            }
            space.appendChild(fragment);
        });
    </script>
</body>

</html>
