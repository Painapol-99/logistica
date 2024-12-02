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

        $totalItems = CartItem::where('user_id', Auth::id())->sum('cantidad');

        return response()->json(['success' => true, 'totalItems' => $totalItems]);
    }

    public function mostrar()
    {
        $carrito = CartItem::where('user_id', Auth::id())->with('producto')->get();
        $totalItems = $carrito->sum('cantidad');
        return view('compras.carrito', compact('carrito', 'totalItems'));
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

    public function pago(Request $request)
    {
        $carrito = CartItem::where('user_id', Auth::id())->with('producto')->get();
        $tip = $request->input('tip', 0);
        return view('compras.pago', compact('carrito', 'tip'));
    }

    public function procesarPago(Request $request)
    {
        $carrito = CartItem::where('user_id', Auth::id())->with('producto')->get();
        $total = $carrito->sum(function($item) {
            return $item->producto->precio * $item->cantidad;
        });

        $tip = $request->input('tip', 0);
        $totalConPropina = $total + $tip;

        // Lógica para procesar el pago con $totalConPropina
        // ...

        return redirect()->route('pago')->with('success', 'Pago procesado correctamente');
    }

    public function index()
    {
        $productos = Producto::all();
        $totalItems = 0;
        if (Auth::check()) {
            $totalItems = CartItem::where('user_id', Auth::id())->sum('cantidad');
        }
        return view('productos.index', compact('productos', 'totalItems'));
    }

    public function totalItems()
    {
        $totalItems = 0;
        if (Auth::check()) {
            $totalItems = CartItem::where('user_id', Auth::id())->sum('cantidad');
        }
        return response()->json(['totalItems' => $totalItems]);
    }
}
?>
