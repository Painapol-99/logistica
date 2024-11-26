<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Productos Disponibles</title>
        <style>
            /*------------------------------------- GENERAL  ------------------------------------- */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Teko", sans-serif;
            }

            .bodyLogin {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: linear-gradient(180deg, #FF7E5F, #FEB47B); /* Degradado atardecer */
                background-size: cover;
                background-position: center;
            }

            /*------------------------------------- FORMULARIO  ------------------------------------- */
            .caja {
                width: 420px;
                background: transparent;
                color: #fff;
                border-radius: 2rem;
                padding: 3rem 4rem;
                border: 2px solid #155724;
                box-shadow: 0 0 10px #155724;
                backdrop-filter: blur(20px);
            }

            .caja h1 {
                font-size: 36px;
                text-align: center;
                letter-spacing: 1rem;
            }

            .caja .input-box {
                position: relative;
                width: 100%;
                height: 50px;
                margin: 30px 0;
            }

            .input-box input {
                width: 100%;
                height: 100%;
                background: transparent;
                border: none;
                outline: none;
                box-shadow: 0 0 10px #155724;
                border-radius: 40px;
                font-size: 16px;
                color: #fff;
                padding: 20px 45px 20px 20px;
            }

            .input-box input::placeholder {
                color: #fff;
            }

            .caja .btn {
                width: 100%;
                background: #fff;
                border: none;
                outline: none;
                border-radius: 40px;
                cursor: pointer;
                font-size: 16px;
                color: #333;
                font-weight: 600;
                padding: 0.5rem;
                letter-spacing: 5px;
                transition: all 0.6s ease;
                margin-bottom: 1rem;
            }

            .btn:hover {
                background-color: #000000;
                box-shadow: 0 0 10px #155724;
                color: #155724;
                border-color: #155724;
            }

            .caja .register-link {
                font-size: 14.5px;
                text-align: center;
                margin-top: 20px 0 15px;
            }

            .register-link p a {
                color: #fff;
                text-decoration: none;
                font-weight: 600;
            }

            .register-link p a:hover {
                text-decoration: underline;
            }

            /*------------------------------------- FONDO ESTRELLADO  ------------------------------------- */
            #space {
                position: absolute;
                width: 100%;
                height: 100%;
                overflow: hidden;
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

            /*------------------------------------- PRODUCTOS ------------------------------------- */
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
                font-size: 3rem;
                color: #333;
                text-align: center;
                margin-top: 20px;
            }

            .container-fluid {
                width: 90%;
                max-width: 1400px;
                margin: 0 auto;
                padding-top: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
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
                flex-wrap: wrap;
                gap: 15px;
                justify-content: flex-start;
                padding: 0 20px;
            }

            .card {
                border: none;
                border-radius: 15px;
                overflow: hidden;
                background-color: #fff;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 350px;
                transition: transform 0.3s ease-in-out;
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

            .price {
                font-size: 1.2rem;
                font-weight: bold;
                color: #333;
            }

            .agregar-carrito {
                background-color: #007bff;
                color: #fff;
                padding: 0.7rem 1.5rem;
                border: none;
                border-radius: 25px;
                cursor: pointer;
                transition: background-color 0.3s, transform 0.2s;
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
    <body class="bodyLogin">
        <div id="space">
            <!-- Fondo estrellado -->
            <div class="star" style="top: 10%; left: 30%; width: 5px; height: 5px;"></div>
            <div class="star" style="top: 20%; left: 50%; width: 7px; height: 7px;"></div>
            <div class="star" style="top: 40%; left: 80%; width: 4px; height: 4px;"></div>
            <div class="star" style="top: 70%; left: 60%; width: 6px; height: 6px;"></div>
            <div class="star" style="top: 90%; left: 20%; width: 3px; height: 3px;"></div>
            <div class="star" style="top: 60%; left: 10%; width: 4px; height: 4px;"></div>
            <!-- Puedes añadir más estrellas aquí -->
        </div>

        <div class="container-fluid">
            <h1>Productos Disponibles</h1>
            <div id="mensaje"></div>

            <div class="row">
                @foreach($productos as $producto)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card">
                            <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">{{ $producto->descripcion }}</p>
                                <p class="price">Precio: {{ $producto->precio }}€</p>
                                <button class="agregar-carrito" data-id="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}" data-precio="{{ $producto->precio }}">Añadir al carrito</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h2>Carrito</h2>
            <ul id="lista-carrito"></ul>
        </div>
        <script src="{{ asset('js/carrito.js') }}"></script>
    </body>
    </html>
</x-app-layout>
