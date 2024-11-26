<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
        ]);

        $carrito = session()->get('carrito', []);
        $carrito[] = [
            'nombre' => $request->nombre,
            'precio' => $request->precio,
        ];

        session()->put('carrito', $carrito);

        return redirect()->route('dashboard');
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito', []);
        return view('compras.carrito', compact('carrito'));
    }
}
?>
