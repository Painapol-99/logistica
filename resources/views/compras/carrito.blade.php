<x-app-layout>
<div class="container">
    <h1>Carrito de Compras</h1>
    @if(empty($carrito))
        <p>No hay productos en el carrito.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($carrito as $id => $productos)
            <tr>
                <td>{{ $productos['nombre'] }}</td>
                <td>{{ $productos['cantidad'] }}</td>
                <td>${{ $productos['precio'] }}</td>
                <td>${{ $productos['cantidad'] * $productos['precio'] }}</td>
            </tr>
            @php $total += $productos['cantidad'] * $productos['precio']; @endphp
            @endforeach
        </tbody>
    </table>
    <h3>Total: ${{ $total }}</h3>
    <form action="{{ route('comprar') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Procesar Compra</button>
    </form>
    @endif
</div>
</x-app-layout>
