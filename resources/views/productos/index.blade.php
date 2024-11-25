<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos Disponibles</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        /* General */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Teko", sans-serif;
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
            background: linear-gradient(180deg, #F27059, #FFD194); /* Fondo atardecer */
        }

        #space {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .star {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.7);
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

        h1 {
            font-family: 'Teko', sans-serif;
            font-size: 3rem;
            color: #FFDDC1;
            text-align: center;
            margin-top: 20px;
            letter-spacing: 0.1rem;
        }

        .container-fluid {
            min-height: 100vh;
            padding-top: 20px;
            width: 90%; /* Ajusta el ancho del contenedor */
            max-width: 1400px; /* El máximo ancho del contenedor */
            margin: 0 auto; /* Centra el contenedor */
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
            max-width: 350px; /* Limita el tamaño de las tarjetas */
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

        /* Estilos del login */
        .caja {
            position: relative;
            z-index: 2;
            width: 400px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            margin-top: 30px; /* Espacio entre el login y los productos */
        }

        .caja h1 {
            font-size: 2rem;
            text-align: center;
            color: #FFDDC1;
            margin-bottom: 1rem;
            letter-spacing: 0.1rem;
        }

        .input-box {
            position: relative;
            width: 100%;
            margin: 1rem 0;
        }

        .input-box input {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            outline: none;
            transition: background-color 0.3s ease;
        }

        .input-box input::placeholder {
            color: #CCCCCC;
        }

        .input-box input:focus {
            background: rgba(255, 255, 255, 0.2);
        }

<<<<<<< HEAD
                            <div class="card-body" style="background-color: #f9f9f9;">
                                <h5 class="card-title" style="font-size: 1.3rem; font-weight: bold;">{{ $producto->nombre }}</h5>
                                <p class="card-text" style="font-size: 1rem; color: #555;">{{ $producto->descripcion }}</p>
                                <p class="card-text price" style="font-size: 1.2rem; color: #333; font-weight: bold;">Precio: {{ $producto->precio }}€</p>
                                
                                
                            </div>
=======
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #FFDDC1;
            margin-bottom: 1rem;
        }

        .remember-forgot label input {
            margin-right: 0.3rem;
            accent-color: #FFDDC1;
        }

        .remember-forgot a {
            color: #FFDDC1;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            background: #FFDDC1;
            color: #333333;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            letter-spacing: 0.05rem;
            margin-top: 1rem;
        }

        .btn:hover {
            background: #FFD194;
            color: #333333;
        }

        .register-link {
            text-align: center;
            font-size: 0.9rem;
            margin-top: 1rem;
            color: #FFDDC1;
        }

        .register-link a {
            color: #FFD194;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Fondo de estrellas -->
    <div id="space"></div>

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

                        <div class="card-body" style="background-color: #f9f9f9; text-align: center;">
                            <h5 class="card-title" style="font-size: 1.3rem; color: #333;">{{ $producto->nombre }}</h5>
                            <p class="card-text" style="font-size: 1rem; color: #555;">{{ $producto->descripcion }}</p>
                            <p class="card-text price" style="font-size: 1.2rem; color: #333;">$ {{ number_format($producto->precio, 2) }}</p>
                            <button class="agregar-carrito btn" onclick="agregarAlCarrito({{ $producto->id }})" style="background-color: #FFDDC1; color: #333;">Agregar al carrito</button>
>>>>>>> 4c948f62e261ea484c0a840f60e8720d2be749e3
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
