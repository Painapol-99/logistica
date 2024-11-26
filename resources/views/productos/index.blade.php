<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Disponibles - LogFood</title>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        h1 {
            font-size: 2.5rem;
            margin: 20px 0;
            text-align: center;
            color: var(--color-secundario);
        }

        .row {
            margin-top: 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 10px;
        }

        .price {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--color-fondo-1);
        }

        .btn {
            background-color: #28a745; /* Changed to a professional green color */
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838; /* Darker shade of green for hover effect */
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

        .search-bar {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            display: flex;
            justify-content: center;
        }

        .search-bar input {
            width: 80%;
            padding: 10px;
            border-radius: 20px 0 0 20px;
            border: 1px solid #ccc;
            outline: none;
        }

        .search-bar button {
            width: 20%;
            padding: 10px;
            border-radius: 0 20px 20px 0;
            border: none;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <!-- Nuevo Header -->
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

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" id="search" placeholder="Buscar productos...">
        <button onclick="searchProducts()">Buscar</button>
    </div>

    <!-- Notification -->
    <div id="notification" class="notification"></div>

    <!-- Contenido Principal -->
    <div class="container mt-4" id="productos">
        <h1>Productos Disponibles</h1>
        <div class="row" id="product-list">
            @foreach($productos as $producto)
            <div class="col-md-4 mb-4 product-item">
                <div class="card">
                    <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="price">{{ $producto->precio }}€</p>
                        <button class="btn agregar-carrito" data-id="{{ $producto->id }}">Agregar al Carrito</button>
                        <form action="{{ route('carrito.agregar') }}" method="POST" class="d-none">
                            @csrf
                            <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                            <input type="hidden" name="precio" value="{{ $producto->precio }}">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        function searchProducts() {
            const searchTerm = document.getElementById('search').value.toLowerCase();
            document.querySelectorAll('.product-item').forEach(item => {
                const productName = item.querySelector('.card-title').innerText.toLowerCase();
                if (productName.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        document.querySelectorAll('.agregar-carrito').forEach(boton => {
            boton.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                fetch('{{ route('carrito.agregar') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        const notification = document.getElementById('notification');
                        notification.innerText = data.mensaje;
                        notification.style.display = 'block';
                        setTimeout(() => notification.style.display = 'none', 3000);
                    });
            });
        });
    </script>
    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>
</body>

</html>