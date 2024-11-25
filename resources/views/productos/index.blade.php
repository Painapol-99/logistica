<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Productos Disponibles</title>
        <style>
            @keyframes fondoDinamico {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

            body {
                font-family: "Roboto", sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f0f0f0;
                color: #333;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                align-items: center;
                justify-content: flex-start;
            }

            h1 {
                font-family: 'Roboto', sans-serif;
                font-size: 3rem;
                color: #333;
                text-align: center;
                margin-top: 20px;
            }

            .container-fluid {
                min-height: 100vh;
                padding-top: 20px;
                width: 100%;
            }

            #mensaje {
                display: none;
                position: fixed;
                top: 10%;
                left: 50%;
                transform: translateX(-50%);
                width: 90%;
                max-width: 400px;
                padding: 1rem;
                background-color: #28a745;
                color: #fff;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            }

            .row {
                display: flex;
                justify-content: flex-start;
                gap: 15px;
                flex-wrap: wrap;
                padding: 0 20px;
            }

            .card {
                border: none;
                border-radius: 15px;
                overflow: hidden;
                transition: transform 0.3s ease-in-out;
                background-color: #fff;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                width: 100%;
            }

            .card-img-top {
                object-fit: cover;
                height: 200px;
                width: 100%;
            }

            .card-body {
                background-color: #f9f9f9;
                padding: 1.5rem;
                text-align: center;
            }

            .card-title {
                font-size: 1.3rem;
                font-weight: bold;
                color: #333;
            }

            .card-text {
                font-size: 1rem;
                color: #555;
            }

            .card-text.price {
                font-size: 1.2rem;
                color: #333;
                font-weight: bold;
            }

            .agregar-carrito {
                transition: background-color 0.3s, transform 0.2s;
                background-color: #007bff;
                color: #fff;
                padding: 0.7rem 1.5rem;
                border: none;
                border-radius: 25px;
                cursor: pointer;
            }

            .agregar-carrito:hover {
                background-color: #2575fc;
                transform: scale(1.1);
            }

            .card:hover {
                transform: scale(1.05);
            }
        </style>
<!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        <button onclick="location.href='{{ route('profile.edit') }}'" class="btn btn-primary mt-2">Profile</button>
                        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mt-2">Logout</button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        
    </head>
    <body>
        <div class="container-fluid px-0" style="min-height: 100vh; background-color: #f0f0f0; padding-top: 20px;">
            <!-- Título de la página -->
            <h1 class="text-center my-5" style="font-family: 'Roboto', sans-serif; color: #333;">Productos Disponibles</h1>

            <!-- Mensaje de éxito -->
            <div id="mensaje" class="alert alert-success" style="display: none; position: fixed; top: 10%; left: 50%; transform: translateX(-50%); width: 90%; max-width: 400px;"></div>

            <!-- Fila de productos -->
            <div class="row justify-content-start">
                @foreach($productos as $producto)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <!-- Tarjeta de producto -->
                        <div class="card shadow-lg rounded" style="border: none; overflow: hidden; transition: transform 0.3s; background-color: #fff;">
                            <!-- Imagen del producto -->
                            <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}" style="object-fit: cover; height: 200px;">

                            <div class="card-body" style="background-color: #f9f9f9;">
                                <h5 class="card-title" style="font-size: 1.3rem; font-weight: bold;">{{ $producto->nombre }}</h5>
                                <p class="card-text" style="font-size: 1rem; color: #555;">{{ $producto->descripcion }}</p>
                                <p class="card-text price" style="font-size: 1.2rem; color: #333; font-weight: bold;">Precio: {{ $producto->precio }}€</p>
                                
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            // Evento para agregar al carrito
            document.querySelectorAll('.agregar-carrito').forEach(boton => {
                boton.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    fetch('{{ route("carrito.agregar") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ id })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Mostrar el mensaje de éxito
                        const mensaje = document.getElementById('mensaje');
                        mensaje.innerText = data.mensaje;
                        mensaje.style.display = 'block';
                        
                        // Desaparecer el mensaje después de 3 segundos
                        setTimeout(() => mensaje.style.display = 'none', 3000);
                    });
                });
            });

            // Animación al pasar el ratón sobre las tarjetas
            document.querySelectorAll('.card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });

            // Animación del botón al pasar el ratón
            document.querySelectorAll('.agregar-carrito').forEach(boton => {
                boton.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#2575fc';
                    this.style.transform = 'scale(1.1)';
                });
                boton.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '#007bff';
                    this.style.transform = 'scale(1)';
                });
            });
        </script>
    </body>
    </html>
</x-app-layout>
