<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CartItem;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();
        $carrito = CartItem::with('producto')->where('user_id', auth()->id())->get();
        return view('productos.index', compact('productos', 'carrito'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'categoria' => 'required|exists:categorias,id',
            'imagen' => 'required|string|max:255',
        ]);

        return Producto::create($request->all());
    }

    public function show(Producto $productos)
    {
        return $productos;
    }

    public function update(Request $request, Producto $productos)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'categoria' => 'required|exists:categorias,id',
            'imagen' => 'required|string|max:255',
        ]);

        $productos->update($request->all());

        return $productos;
    }

    public function destroy(Producto $productos)
    {
        $productos->delete();

        return response()->noContent();
    }
}