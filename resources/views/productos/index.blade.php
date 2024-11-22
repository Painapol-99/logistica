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
                                <p class="card-text price" style="font-size: 1.2rem; color: #333; font-weight: bold;">Precio: ${{ $producto->precio }}</p>
                                
                                <!-- Botón para agregar al carrito -->
                                <button class="btn btn-outline-primary agregar-carrito" data-id="{{ $producto->id }}" style="transition: background-color 0.3s, transform 0.2s;">
                                    Agregar al Carrito
                                </button>
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
