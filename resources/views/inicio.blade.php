<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales */
        @import url('https://fonts.googleapis.com/css2?family=Sofadi+One&family=Teko:wght@300..700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Teko", sans-serif;
        }

        body {
            background: linear-gradient(180deg, #FF6F61, #FFD194); /* Fondo cálido */
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 0;
            overflow-x: hidden;
            font-size: 16px;
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

        /* Centrado general del contenido */
        .centered-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        /* Header */
        header {
            width: 100%;
            text-align: center;
            margin-bottom: 2rem;
            z-index: 1;
            padding: 1rem 0;
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .logo {
            width: 250px;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.6rem;
            color: #FFF5EE;
            font-family: 'Amatic SC', sans-serif;
            letter-spacing: 2px;
            text-align: center;
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
            color: #FFF5EE;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #FFD194;
        }

        /* Sección Hero */
        .hero {
            text-align: center;
            padding: 3rem;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7);
            width: 100%;
            max-width: 900px;
            margin: 4rem 0;
            z-index: 1;
            transform: translateY(-50px);
        }

        .hero h1 {
            font-size: 3.2rem;
            margin-bottom: 1rem;
            color: #FFDDC1;
            font-family: 'Sofadi One', sans-serif;
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            color: #FFD194;
        }

        .btn {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            background: #FFDDC1;
            color: #333;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 1rem;
            transition: background-color 0.3s ease, color 0.3s ease;
            display: inline-block;
        }

        .btn:hover {
            background: #FFD194;
            color: #333;
        }

        /* Características */
        .carac {
            padding: 4rem 1rem;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
            z-index: 1;
        }

        /* Caja combinada de características */
        .caja-combinada {
            background: rgba(0, 0, 0, 0.7);
            padding: 3rem;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            margin-bottom: 2rem;
            transition: transform 0.3s ease-in-out;
        }

        .caja-combinada:hover {
            transform: scale(1.05);
        }

        .caja-combinada h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #FFDDC1;
        }

        .caja-combinada p {
            color: #FFD194;
            font-size: 1rem;
        }

        /* Footer */
        footer {
            width: 100%;
            text-align: center;
            margin-top: 3rem;
            color: #FFDDC1;
            font-size: 1rem;
            padding: 1rem;
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.5);
            z-index: 1;
            position: relative;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .btn {
                padding: 0.8rem 2rem;
                font-size: 1rem;
            }

            .features {
                flex-direction: column;
                align-items: center;
            }

            .caja-combinada {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <div id="space"></div> <!-- Fondo estrellado -->

    <header>
        <div class="centered-content">
            <img class="logo" src="logoCamion.png" alt="Logfood Logo" />
            <p>Logfood</p>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/producto') }}">Productos</a></li>
                    <li><a href="{{ url('/carrito') }}">Carrito</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <h1>Bienvenido a LogFood</h1>
            <p>Optimiza tus repartos con nuestra aplicación.</p>
            <div>
                <a href="{{ url('/productos') }}" class="btn">Ver Productos</a>
                <a href="{{ url('/repartidor') }}" class="btn">Ver Repartos</a>
            </div>
        </section>

        <section class="carac">
            <h2>Nuestras Características</h2>
            <section class="caja-combinada">
                <h3>Gestión de Pedidos</h3>
                <p>Monitorea y organiza tus pedidos fácilmente.</p>

                <h3>Asignación de Repartos</h3>
                <p>Asigna y gestiona entregas a los repartidores con un solo clic.</p>

                <h3>Soporte Completo</h3>
                <p>Estamos aquí para ayudarte las 24 horas, todos los días.</p>
            </section>
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
