<?php
    // Iniciar la sesión
    session_start();

    // Vaciar el carrito
    unset($_SESSION['carrito']);

    // Redirigir al carrito
    header('Location: /carrito');
    exit;
?>