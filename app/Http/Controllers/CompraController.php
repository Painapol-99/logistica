<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class CompraController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        return view('compras.index', compact('productos'));
    }

    public function agregarCarrito(Request $request)
    {
        $carrito = session()->get('carrito', []);
        $id = $request->input('id');
        $productos = Productos::find($id);

        if ($productos) {
            if (isset($carrito[$id])) {
                $carrito[$id]['cantidad']++;
            } else {
                $carrito[$id] = [
                    'nombre' => $productos->nombre,
                    'precio' => $productos->precio,
                    'cantidad' => 1,
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
        return redirect()->route('compras.index')->with('success', 'Compra realizada con éxito.');
    }
}
