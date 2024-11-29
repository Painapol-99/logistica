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
            justify-content: flex-start; /* Cambiar a flex-start */
            align-items: center;
            font-size: 16px;
            overflow-x: hidden;
            overflow-y: auto; /* Permitir desplazamiento vertical */
            position: relative;
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
 
        .cart-item img {
            max-width: 100px; /* Ajustar el tamaño máximo de la imagen */
            margin-right: 10px; /* Añadir margen derecho */
        }
 
        .cart-item-details {
            display: flex;
            flex-direction: column;
            gap: 5px; /* Añadir espacio entre los detalles del producto */
        }
 
        .cart-item-buttons {
            display: flex;
            gap: 5px; /* Añadir espacio entre los botones */
        }
 
        .cart-item-buttons button {
            padding: 5px 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
 
        .cart-item-buttons .btn-add {
            background-color: #28a745;
            color: #fff;
        }
 
        .cart-item-buttons .btn-add:hover {
            background-color: #218838;
        }
 
        .cart-item-buttons .btn-remove {
            background-color: #dc3545;
            color: #fff;
        }
 
        .cart-item-buttons .btn-remove:hover {
            background-color: #c82333;
        }
 
        .cart-item-name,
        .cart-item-price,
        .cart-item-quantity,
        .cart-item-total {
            margin-bottom: 5px; /* Añadir margen inferior */
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

        .btn-secondary {
            background-color: #6f42c1;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5936a2;
        }
 
        footer {
            width: 100%;
            text-align: center;
            padding: 1rem;
            color: var(--color-secundario);
            background-color: var(--color-dark);
            box-shadow: 0 -4px 10px var(--color-shadow);
            position: relative; /* Cambiar de absolute a relative */
            bottom: 0;
            margin-top: auto; /* Añadir margen superior automático */
        }
 
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
            margin-top: 20px;
            width: 100%; /* Añadir ancho completo */
            padding: 0 1rem; /* Añadir padding para mejorar el espaciado */
            overflow-y: auto; /* Permitir desplazamiento vertical en el main */
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
                <img src="{{ asset('img/' . $item->producto->imagen) }}" alt="{{ $item->producto->nombre }}">
                <div class="cart-item-details">
                    <span class="cart-item-name">{{ $item->producto->nombre }}</span>
                    <span class="cart-item-price">{{ $item->producto->precio }}€</span>
                    <span class="cart-item-quantity">Cantidad: {{ $item->cantidad }}</span>
                    <span class="cart-item-total">Total: {{ $item->producto->precio * $item->cantidad }}€</span>
                </div>
                <div class="cart-item-buttons">
                    <form action="{{ route('carrito.actualizar', $item->producto_id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="cantidad" value="{{ $item->cantidad + 1 }}">
                        <button type="submit" class="btn-add">+</button>
                    </form>
                    @if($item->cantidad > 1)
                    <form action="{{ route('carrito.actualizar', $item->producto_id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="cantidad" value="{{ $item->cantidad - 1 }}">
                        <button type="submit" class="btn-remove">-</button>
                    </form>
                    @else
                    <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-remove">-</button>
                    </form>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
        <div class="total-price">
            <h3>Precio Total: {{ $carrito->sum(function($item) { return $item->producto->precio * $item->cantidad; }) }}€</h3>
        </div>
        <form action="{{ route('pago') }}" method="GET">
            <button type="submit" class="btn btn-success">Confirmar Compra</button>
        </form>
        <div class="d-flex justify-content-center gap-2 mt-2">
            
            <a href="/dashboard" class="btn btn-primary">Volver a la tienda</a>
            <form action="{{ route('carrito.vaciar') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Vaciar Carrito</button>
            </form>
            <a href="/productos" class="btn btn-secondary">Volver a comprar</a>
        </div>
    </main>
 
    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipOptions = document.querySelectorAll('input[name="tip"]');
            const tipAmountElement = document.getElementById('tip-amount');
            const tipInput = document.getElementById('tip-input');
            const totalPrice = {{ $carrito->sum(function($item) { return $item->producto->precio * $item->cantidad; }) }};
 
            tipOptions.forEach(option => {
                option.addEventListener('change', function() {
                    const tipPercentage = parseInt(this.value);
                    const tipAmount = (totalPrice * tipPercentage / 100).toFixed(2);
                    tipAmountElement.textContent = `Propina: ${tipAmount}€`;
                    tipInput.value = tipAmount;
                });
            });

            function actualizarContadorCarrito() {
                const carrito = @json($carrito);
                const contador = carrito.reduce((total, item) => total + item.cantidad, 0);
                document.getElementById('cart-count').innerText = contador;
            }

            actualizarContadorCarrito();
        });
    </script>
</body>
 
</html>

