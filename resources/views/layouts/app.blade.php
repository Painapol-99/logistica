<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inicio</title>
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Sofadi+One&family=Teko:wght@300..700&display=swap');
            </style>
        </head>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
            <header>
                <img class="logo" src="{{ asset('img/logocamion.png') }}" alt="280" width="280"/>
                <p>Logfood</p>
                <nav>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li><a href="{{ url('/about') }}">Sobre Nosotros</a></li>
                        <li><a href="{{ url('/productos') }}">Productos</a></li>
                        <li><a href="{{ url('/carrito') }}">Carrito</a></li>
                        <li><a href="{{ url('/contact') }}">Contacto</a></li>
                        
                    </ul>
                </nav>
            </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>
    <script src="js/script.js"></script>
</html>
