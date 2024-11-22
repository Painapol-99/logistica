

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
            }
    
            header img {
                width: 150px;
            }
    
            nav ul {
                list-style-type: none;
                padding: 0;
                text-align: center;
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
            <img class="logo" src="logoCamion.png" alt="Logfood Logo" width="280"/>
            <p>Logfood</p>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/producto') }}">Productos</a></li>
                    <li><a href="{{ url('/carrito') }}">Carrito</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                </ul>
            </nav>
        </header>
    
        <div class="container">
            <h1>Productos Disponibles</h1>
    
            <div id="mensaje" class="alert"></div>
    
            <div class="productos">
                @foreach($productos as $producto)
                <div class="producto-card">
                    <img src="img/productos/{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
                    <h5>{{ $producto->nombre }}</h5>
                    <p>{{ $producto->descripcion }}</p>
                    <p class="precio">${{ $producto->precio }}</p>
                    <button class="btn btn-primary agregar-carrito" data-id="{{ $producto->id }}">
                        Agregar al Carrito
                    </button>
                </div>
                @endforeach
            </div>
    
        </div>
    
        <script>
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
                        document.getElementById('mensaje').innerText = data.mensaje;
                        document.getElementById('mensaje').style.display = 'block';
                        setTimeout(() => document.getElementById('mensaje').style.display = 'none', 3000);
                    });
                });
            });
        </script>
    
    </body>
    </html>
    

    