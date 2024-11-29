<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('productos.index', compact('productos', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id', // Cambiado a categoria_id
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
            'categoria_id' => 'required|exists:categorias,id', // Cambiado a categoria_id
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