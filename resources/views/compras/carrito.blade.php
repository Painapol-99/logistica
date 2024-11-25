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
<?php
    session_start();

    // Obtener los productos del carrito
    $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
?>
     <h1>Tu Carrito</h1>
    <?php if (!empty($carrito)): ?>
        <ul>
            <?php foreach ($carrito as $producto): ?>
                <li>
                    <?php echo htmlspecialchars($producto['nombre']); ?> - $<?php echo htmlspecialchars($producto['precio']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <form action="vaciar.php" method="POST">
            <button type="submit">Vaciar Carrito</button>
        </form>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
    <a href="/dashboard">Volver a la tienda</a>
</div>
</x-app-layout>
