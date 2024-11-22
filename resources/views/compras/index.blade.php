@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos Disponibles</h1>
    <div id="mensaje" class="alert alert-success" style="display: none;"></div>
    <div class="row">
        @foreach($productos as $productos)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $productos->nombre }}</h5>
                    <p class="card-text">{{ $productos->descripcion }}</p>
                    <p class="card-text">Precio: ${{ $productos->precio }}</p>
                    <button class="btn btn-primary agregar-carrito" data-id="{{ $productos->id }}">
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
@endsection
