<!DOCTYPE html>
<html lang="es">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Carrito - LogFood</title>
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
            justify-content: space-between;
            align-items: center;
            font-size: 16px;
            overflow-x: hidden;
            position: relative;
            overflow: hidden;
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
 
        .container {
            margin-top: 20px;
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
 
        .btn {
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            transition: background-color 0.3s;
        }
 
        .btn:hover {
            background-color: #218838;
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
            padding: 1rem;
            color: var(--color-secundario);
            background-color: var(--color-dark);
            box-shadow: 0 -4px 10px var(--color-shadow);
            position: absolute;
            bottom: 0;
        }
 
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
            margin-top: 20px;
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
 
    <main class="container">
        <h1>Tu Carrito</h1>
        <ul id="lista-carrito" class="list-group mb-4">
            @foreach($carrito as $item)
            <li class="cart-item list-group-item">
                <span class="cart-item-name">{{ $item->producto->nombre }}</span>
                <span class="cart-item-price">{{ $item->producto->precio }}€</span>
                <span class="cart-item-quantity">Cantidad: {{ $item->cantidad }}</span>
            </li>
            @endforeach
        </ul>
        <button onclick="vaciarCarrito()" class="btn btn-danger mt-2">Vaciar Carrito</button>
        <a href="/dashboard" class="btn btn-primary mt-2">Volver a la tienda</a>
    </main>
 
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const listaCarrito = document.querySelector("#lista-carrito");
 
            function renderCarrito() {
                listaCarrito.innerHTML = "";
                carrito.forEach(item => {
                    const li = document.createElement("li");
                    li.classList.add("cart-item", "list-group-item");
                    li.innerHTML = `<span class="cart-item-name">${item.nombre}</span> <span class="cart-item-price">${item.precio}€</span>`;
                    listaCarrito.appendChild(li);
                });
            }
 
            renderCarrito();
        });
 
        function vaciarCarrito() {
            localStorage.removeItem('carrito');
            document.getElementById('lista-carrito').innerHTML = '';
        }
 
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
 
    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>
</body>
 
</html>
