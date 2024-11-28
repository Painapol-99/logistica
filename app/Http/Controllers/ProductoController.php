<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'categoria' => 'required|exists:categorias,id',
        
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