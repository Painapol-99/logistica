<x-app-layout>
    <x-slot name="content">
        <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-dropdown-link>
        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
        <button onclick="location.href='{{ route('profile.edit') }}'" class="btn btn-primary mt-2">Profile</button>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mt-2">Logout</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </x-slot>
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
