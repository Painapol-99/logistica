<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pago - LogFood</title>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}&currency=GBP"></script>
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
            overflow-y: auto;
            position: relative;
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
            position: relative;
            bottom: 0;
            margin-top: auto;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
            margin-top: 20px;
            width: 100%;
            padding: 0 1rem;
            overflow-y: auto;
        }

        .tip-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .tip-options input[type="radio"] {
            display: none;
        }

        .tip-options label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .tip-options input[type="radio"]:checked + label {
            background-color: #218838;
        }

        .tip-amount {
            margin-top: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #FFF5EE;
        }
    </style>
</head>

<body>
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
        <h1>Página de Pago</h1>
        <div class="total-price">
            <h3>Precio Total: {{ $carrito->sum(function($item) { return $item->producto->precio * $item->cantidad; }) }}€</h3>
        </div>
        <div class="tip-options">
            <input type="radio" id="tip-10" name="tip" value="10">
            <label for="tip-10">10%</label>
            <input type="radio" id="tip-20" name="tip" value="20">
            <label for="tip-20">20%</label>
            <input type="radio" id="tip-30" name="tip" value="30">
            <label for="tip-30">30%</label>
        </div>
        <div class="tip-amount">Propina: <span id="tip-amount">{{ request()->get('tip', 0) }}</span>€</div>
        <div class="total-with-tip">
            <h3>Total con Propina: <span id="total-with-tip">{{ $carrito->sum(function($item) { return $item->producto->precio * $item->cantidad; }) + request()->get('tip', 0) }}</span>€</h3>
        </div>
        <div id="paypal-button-container"></div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipOptions = document.querySelectorAll('input[name="tip"]');
            const tipAmountElement = document.getElementById('tip-amount');
            const totalWithTipElement = document.getElementById('total-with-tip');
            const totalPrice = {{ $carrito->sum(function($item) { return $item->producto->precio * $item->cantidad; }) }};

            tipOptions.forEach(option => {
                option.addEventListener('change', function() {
                    const tipPercentage = parseInt(this.value);
                    const tipAmount = (totalPrice * tipPercentage / 100).toFixed(2);
                    tipAmountElement.textContent = tipAmount + '€';
                    totalWithTipElement.textContent = (parseFloat(totalPrice) + parseFloat(tipAmount)).toFixed(2) + '€';
                });
            });
        });

        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $carrito->sum(function($item) { return $item->producto->precio * $item->cantidad; }) + $tip }}'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    // Aquí puedes redirigir al usuario a una página de confirmación o realizar otras acciones
                });
            },
            onError: function(err) {
                console.error(err);
            }
        }).render('#paypal-button-container');
    </script>
</body>

</html>