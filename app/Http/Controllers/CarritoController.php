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
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('producto_id', $producto->id)
            ->first();

        if ($cartItem) {
            $cartItem->cantidad++;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'producto_id' => $producto->id,
                'cantidad' => 1,
            ]);
        }

        return response()->json(['success' => 'Producto agregado al carrito']);
    }

    public function mostrar()
    {
        $carrito = CartItem::where('user_id', Auth::id())->with('producto')->get();
        return view('compras.carrito', compact('carrito'));
    }

    public function actualizar(Request $request, $id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('producto_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->cantidad = $request->cantidad;
            $cartItem->save();
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Cantidad actualizada');
    }

    public function eliminar($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado');
    }

    public function vaciar()
    {
        CartItem::where('user_id', Auth::id())->delete();
        return redirect()->route('carrito.mostrar')->with('success', 'Carrito vaciado');
    }

    public function pago()
    {
        $carrito = CartItem::where('user_id', Auth::id())->with('producto')->get();
        return view('compras.pago', compact('carrito'));
    }
}
?>
