<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CompraController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('compras.index', compact('productos'));
    }

    public function agregarCarrito(Request $request)
    {
        $carrito = session()->get('carrito', []);
        $id = $request->input('id');
        $producto = Producto::find($id);

        if ($producto) {
            if (isset($carrito[$id])) {
                $carrito[$id]['cantidad']++;
            } else {
                $carrito[$id] = [
                    'nombre' => $producto->nombre,
                    'cantidad' => 1,
                    'precio' => $producto->precio
                ];
            }
            session()->put('carrito', $carrito);
        }

        return response()->json(['carrito' => $carrito, 'mensaje' => 'Producto agregado al carrito.']);
    }

    public function mostrarCarrito()
    {
        $carrito = session()->get('carrito', []);
        return view('compras.carrito', compact('carrito'));
    }

    public function procesarCompra(Request $request)
    {
        session()->forget('carrito');
        return redirect()->route('productos.index')->with('success', 'Compra realizada con éxito.');
    }
}