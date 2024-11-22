<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Sofadi+One&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofadi+One&family=Teko:wght@300..700&display=swap');
        </style>
</head>
<body id="space" class="bodyLogin">

    <header>
        
        <img class="logo" src="{{ asset('img/logoCamion.png') }}" alt="280" width="280"/>
        <p>Logfood</p>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/about') }}">Sobre Nosotros</a></li>
                <li><a href="{{ url('/productos') }}">Productos</a></li>
                <li><a href="{{ url('/repartidor') }}">Repartos</a></li>
                <li><a href="{{ url('/contact') }}">Contacto</a></li>
            </ul>
        </nav>
    </header>
    
    

    <main>
        <section class="hero">
            <h1>Bienvenido a LogFood</h1>

            <p>Optimiza tus repartos con nuestra aplicación.</p>
            <div>
                <a href="{{ url('/productos') }}" class="btn">Ver Productos</a>
                <a href="{{ url('/repartidor') }}" class="btn">Ver Repartos</a>
            </div>
        </section>

        <section class="carac">
            <h2>Nuestras Características</h2>
            <section class="features">
            <div class="caja">
                <h3>Gestión de Pedidos</h3>
                <p>Monitorea y organiza tus pedidos fácilmente.</p>
            </div>
            <div class="caja">
                <h3>Asignación de Repartos</h3>
                <p>Asigna y gestiona entregas a los repartidores con un solo clic.</p>
            </div>
            <div class="caja">
                <h3>Soporte Completo</h3>
                <p>Estamos aquí para ayudarte las 24 horas, todos los días.</p>
            </div>
        </section>
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
=======
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

>>>>>>> 58f6ab5b64353c207df18a44d5a76e2cb544cc5a
