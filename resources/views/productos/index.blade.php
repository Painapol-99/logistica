<x-app-layout>
    <div class="container-fluid px-0" style="min-height: 100vh; background-color: #f0f0f0; padding-top: 20px;">
        <!-- Título de la página -->
        <h1 class="text-center my-5" style="font-family: 'Roboto', sans-serif; color: #333;">Productos Disponibles</h1>

        <!-- Mensaje de éxito -->
        <div id="mensaje" class="alert alert-success" style="display: none; position: fixed; top: 10%; left: 50%; transform: translateX(-50%); width: 90%; max-width: 400px;"></div>

        <!-- Fila de productos -->
        <div class="row justify-content-start">
            @foreach($productos as $producto)
<<<<<<< HEAD
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <!-- Tarjeta de producto -->
                <div class="card shadow-lg rounded" style="border: none; overflow: hidden; transition: transform 0.3s; background-color: #fff;">
                    <!-- Imagen del producto -->
                    <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}" style="object-fit: cover; height: 200px;">

                    <div class="card-body" style="background-color: #f9f9f9;">
                        <h5 class="card-title" style="font-size: 1.3rem; font-weight: bold;">{{ $producto->nombre }}</h5>
                        <p class="card-text" style="font-size: 1rem; color: #555;">{{ $producto->descripcion }}</p>
                        <p class="card-text" style="font-size: 1.2rem; color: #333; font-weight: bold;">Precio: ${{ $producto->precio }}</p>
                        
                        <!-- Botón para agregar al carrito -->
                        <button class="btn btn-outline-primary agregar-carrito" data-id="{{ $producto->id }}" style="transition: background-color 0.3s, transform 0.2s;">
                            Agregar al Carrito
                        </button>
=======
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: ${{ $producto->precio }}</p>
>>>>>>> 224f064f5d178de5e6a11280d9303d0ed1ab3b83
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<<<<<<< HEAD

    <script>
        // Evento para agregar al carrito
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
                    // Mostrar el mensaje de éxito
                    const mensaje = document.getElementById('mensaje');
                    mensaje.innerText = data.mensaje;
                    mensaje.style.display = 'block';
                    
                    // Desaparecer el mensaje después de 3 segundos
                    setTimeout(() => mensaje.style.display = 'none', 3000);
                });
            });
        });

        // Animación al pasar el ratón sobre las tarjetas
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Animación del botón al pasar el ratón
        document.querySelectorAll('.agregar-carrito').forEach(boton => {
            boton.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#2575fc';
                this.style.transform = 'scale(1.1)';
            });
            boton.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '#007bff';
                this.style.transform = 'scale(1)';
            });
        });
    </script>
</x-app-layout>
=======
</x-app-layout>
>>>>>>> 224f064f5d178de5e6a11280d9303d0ed1ab3b83
