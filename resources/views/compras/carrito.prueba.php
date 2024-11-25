<?php
// Recibir los datos del carrito mediante POST
$carrito = isset($_POST['carrito']) ? json_decode($_POST['carrito'], true) : [];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <h1>Tu Carrito</h1>
    <?php if (!empty($carrito)): ?>
        <ul>
            <?php foreach ($carrito as $producto): ?>
                <li>
                    <?php echo htmlspecialchars($producto['nombre']); ?> - $<?php echo htmlspecialchars($producto['precio']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
    <a href="index.blade.php">Volver a la tienda</a>
</body>
</html>



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