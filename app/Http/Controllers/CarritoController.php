<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $request->validate([
            'idProducto' => 'required|exists:productos,id',
        ]);

        $producto = Producto::find($request->idProducto);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('idProducto', $producto->id)
            ->first();

        if ($cartItem) {
            $cartItem->cantidad++;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'idProducto' => $producto->id,
                'cantidad' => 1,
            ]);
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Producto agregado al carrito');
    }

    public function mostrar()
    {
        $carrito = CartItem::where('user_id', Auth::id())->with('producto')->get();
        return view('compras.carrito', compact('carrito'));
    }

    public function actualizar(Request $request, $producto)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('idProducto', $producto)
            ->first();

        if ($cartItem) {
            $cartItem->cantidad = $request->cantidad;
            $cartItem->save();
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Cantidad actualizada');
    }

    public function eliminar($producto)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('idProducto', $producto)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado');
    }
}
?>
