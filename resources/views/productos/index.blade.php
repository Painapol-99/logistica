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
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>