<x-app-layout>

<div class="container mt-4">
    <h1>Tu Carrito</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($carrito->isEmpty())
        <p>No tienes productos en el carrito.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $item)
                    <tr>
                        <td>{{ $item->producto->nombre }}</td>
                        <td>
                            <form action="{{ route('carrito.actualizar', $item->producto_id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" class="form-control">
                                <button type="submit" class="btn btn-sm btn-primary mt-1">Actualizar</button>
                            </form>
                        </td>
                        <td>{{ $item->producto->precio }}€</td>
                        <td>{{ $item->cantidad * $item->producto->precio }}€</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $item->producto_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</x-app-layout>
