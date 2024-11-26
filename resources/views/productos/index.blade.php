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
            position: relative;
        }

        .animated-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/diagonal-stripes.png');
            opacity: 0.1;
            animation: moveBackground 10s linear infinite;
            z-index: -1;
        }

        @keyframes moveBackground {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 100% 100%;
            }
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

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
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

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-name {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .cart-item-price {
            font-size: 1.2rem;
            color: var(--color-fondo-1);
        }
    </style>
</head>

<body>
    <div class="animated-background"></div>
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
                        @auth
                        <form method="POST" action="{{ route('carrito.agregar') }}">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <button type="submit" class="btn btn-success">Agregar al Carrito</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>
</body>

</html>