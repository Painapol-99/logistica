<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $id = $request->input('id');

        $producto = Producto::findOrFail($id);

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
            ];
        }

        session()->put('carrito', $carrito);

        return response()->json(['mensaje' => 'Producto agregado al carrito']);
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito', []);
        return view('compras.carrito', compact('carrito'));
    }
}
