<?php
// Iniciar la sesión
session_start();

// Asegurarse de que el carrito está inicializado como un array
if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Validar los datos enviados por POST
if (isset($_POST['nombre']) && isset($_POST['precio'])) {
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $precio = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);

    if ($nombre && $precio !== false) {
        // Agregar el producto al carrito
        $_SESSION['carrito'][] = [
            'nombre' => $nombre,
            'precio' => $precio
        ];
    }
}

// Redirigir a la página del carrito
header('Location: /carrito');
exit;
?>
