<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
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
            min-height: 100vh;
            background: linear-gradient(180deg, #F27059, #FFD194);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
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

        /* Contenedor */
        .container {
            position: relative;
            z-index: 2;
            max-width: 800px;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #FFDDC1;
            margin-bottom: 1.5rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-primary {
            background: #FFD194;
            color: #333333;
        }

        .btn-primary:hover {
            background: #FFDDC1;
        }

        .btn-danger {
            background: #E63946;
            color: #fff;
        }

        .btn-danger:hover {
            background: #FF6F61;
        }

        .btn-success {
            background: #4CAF50;
            color: #fff;
        }

        .btn-success:hover {
            background: #66BB6A;
        }

        table {
            width: 100%;
            margin: 1.5rem 0;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 0.8rem;
            text-align: left;
            font-size: 1.2rem;
        }

        table thead th {
            background: #FFD194;
            color: #333333;
        }

        table tbody tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.1);
        }

        table tbody tr:nth-child(odd) {
            background: rgba(255, 255, 255, 0.05);
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    <div id="space"></div>
    <div class="container">
        <h1>Carrito de Compras</h1>

        <!-- Verificación del carrito -->
        @if(empty($carrito))
            <p>No hay productos en el carrito.</p>
        @else
            <!-- Tabla de productos -->
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($carrito as $id => $productos)
                        <tr>
                            <td>{{ $productos['nombre'] }}</td>
                            <td>{{ $productos['cantidad'] }}</td>
                            <td>${{ $productos['precio'] }}</td>
                            <td>${{ $productos['cantidad'] * $productos['precio'] }}</td>
                        </tr>
                        @php $total += $productos['cantidad'] * $productos['precio']; @endphp
                    @endforeach
                </tbody>
            </table>
            <h3>Total: ${{ $total }}</h3>
        @endif

        <!-- Acciones -->
        <div class="actions">
            <button onclick="location.href='{{ route('profile.edit') }}'" class="btn btn-primary">Perfil</button>
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Cerrar Sesión</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        @if(!empty($carrito))
            <form action="{{ route('comprar') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Procesar Compra</button>
            </form>
        @endif
    </div>

    <script>
        const space = document.getElementById('space');
        const numStars = 1000;

        for (let i = 0; i < numStars; i++) {
            let star = document.createElement('div');
            star.classList.add('star');

            let size = Math.random() * 3;
            star.style.width = size + 'px';
            star.style.height = size + 'px';
            star.style.top = Math.random() * 100 + 'vh';
            star.style.left = Math.random() * 100 + 'vw';

            let duration = Math.random() * 5 + 3;
            star.style.animationDuration = duration + 's';

            space.appendChild(star);
        }
    </script>
</body>
</html>
