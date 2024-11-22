<x-app-layout>
<div class="container">
    <h1>Productos Disponibles</h1>
    <div id="mensaje" class="alert alert-success" style="display: none;"></div>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>${{ $producto->precio }}</td>
                <td>
                    <button class="btn btn-primary agregar-carrito" data-id="{{ $producto->id }}">
                        Agregar al Carrito
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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