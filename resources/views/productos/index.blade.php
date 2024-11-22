<x-app-layout>
    <div class="container">
        <h1>Productos Disponibles</h1>
        <div id="mensaje" class="alert alert-success" style="display: none;"></div>
        <div class="row">
            @foreach($productos as $producto)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: ${{ $producto->precio }}</p>
                        <button class="btn btn-primary agregar-carrito" data-id="{{ $producto->id }}">
                            Agregar al Carrito
                        </button>
                    </div>
                </div>
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
</x-app-layout>