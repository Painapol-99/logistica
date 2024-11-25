<?php
// Iniciar la sesión
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos Disponibles</title>

    <!-- Agregar estilos básicos para mejorar la presentación -->
    <style>
        /* Estilos para el contenedor de la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        header img {
            width: 150px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            display: flex;
            gap: 15px;
        }

        nav ul li {
            display: inline;
            margin-right: 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .productos {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .producto-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .producto-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .producto-card h5 {
            font-size: 1.25rem;
            margin: 15px 0;
        }

        .producto-card p {
            font-size: 1rem;
            color: #555;
        }

        .producto-card .precio {
            font-size: 1.1rem;
            color: #007bff;
            margin: 10px 0;
        }

        .producto-card .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .producto-card .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            display: none;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <header>
        <img class="logo" src="logoCamion.png" alt="Logfood Logo" width="280" />
        <p>Logfood</p>
        <nav style="position: absolute; top: 20px; right: 20px;">
            <ul style="display: flex; gap: 15px;">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/productos') }}">Productos</a></li>
                <li><a href="{{ url('/carrito') }}">Carrito</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                            <button onclick="location.href='{{ route('profile.edit') }}'"
                                class="btn btn-primary mt-2">Profile</button>
                            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-danger mt-2">Logout</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </x-slot>
                    </x-dropdown>
                </li>
            </ul>
        </nav>

    </header>

    <div class="container">
        <h1>Productos Disponibles</h1>

        <div id="mensaje" class="alert"></div>

        <div class="productos">
            @foreach ($productos as $producto)
                <div class="producto-card">
                    <img src="img/productos/{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
                    <h5>{{ $producto->nombre }}</h5>
                    <p>{{ $producto->descripcion }}</p>
                    <p class="precio">{{ $producto->precio }}€</p>

                    <form action="agregar.php" method="POST">
                        <input type="hidden" name="nombre" value="{{$producto->nombre}}">
                        <input type="hidden" name="precio" value="{{ $producto->precio }}">
                        <button type="submit" class="btn btn-primary agregar-carrito">
                            Agregar al Carrito
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

    </div>

    <script>
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
                        document.getElementById('mensaje').innerText = data.mensaje;
                        document.getElementById('mensaje').style.display = 'block';
                        setTimeout(() => document.getElementById('mensaje').style.display = 'none',
                            3000);
                    });
            });
        });
    </script>

</body>

</html>
