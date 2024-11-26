<?php
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {
    
    echo json_encode([
        "success" => true,
        "message" => "Compra finalizada. Total de productos: " . count($data)
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "El carrito está vacío."
    ]);
}
