<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mi Aplicación')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
</head>
<body>

    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/productos') }}">Productos</a></li>

        </ul>
    </nav>

    <main>
        {{$slot}}
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>
 
</body>
</html>