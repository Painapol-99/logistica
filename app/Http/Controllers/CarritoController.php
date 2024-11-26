<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $producto = [
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio')
        ];

        $carrito = session()->get('carrito', []);
        $carrito[] = $producto;
        session()->put('carrito', $carrito);

        return response()->json(['mensaje' => 'Producto agregado al carrito']);
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito', []);
        return view('compras/carrito', compact('carrito'));
        return Redirect::route('compras/carrito')->compact('carrito');
    }
}
?>
