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

    <!-- Contenido de inicio.blade.php -->
    <header>
        <img class="logo" src="img/logoCamion.png" alt="280" width="280"/>
        <p>Logfood</p>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/productos') }}">Productos</a></li>
                <li><a href="{{ url('/repartidor') }}">Repartos</a></li>
                <li><a href="{{ url('/login') }}">login</a></li>
                <li><a href="{{ url('/register') }}">registro</a></li>
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
</x-app-layout>
