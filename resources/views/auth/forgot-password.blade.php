<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - LogFood</title>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
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
            justify-content: center;
            align-items: center;
            padding: 1rem;
            font-size: 16px;
        }

        .container {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 16px;
            padding: 2rem 3rem;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 8px 20px var(--color-shadow);
            text-align: center;
        }

        .container h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--color-secundario);
            font-family: 'Sofadi One', sans-serif;
        }

        .container p {
            font-size: 1rem;
            margin-bottom: 2rem;
            color: var(--color-hover);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            background: var(--color-secundario);
            color: #333;
            outline: none;
            transition: background-color 0.3s ease;
        }

        input:focus {
            background: var(--color-hover);
        }

        .btn-primary {
            padding: 0.8rem 2rem;
            font-size: 1.2rem;
            background: var(--color-secundario);
            color: #333;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--color-hover);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Recuperar Contraseña</h1>
        <p>¿Olvidaste tu contraseña? No hay problema. Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.</p>

        <!-- Mensaje de estado de sesión -->
        <div class="status mb-4 text-sm">
            {{ session('status') ? session('status') : '' }}
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Dirección de correo -->
            <div>
                <label for="email" style="display:block; margin-bottom: 0.5rem; color: var(--color-secundario); font-size: 1rem;">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingrese su correo electrónico">
                @error('email')
                <span style="color: var(--color-hover); font-size: 0.9rem; display:block; margin-top: 0.5rem;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Enviar Enlace de Restablecimiento</button>
        </form>
    </div>
</body>

</html>
