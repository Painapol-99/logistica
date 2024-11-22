<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        return Productos::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'categoria' => 'required|exists:categorias,id',
        ]);

        return Productos::create($request->all());
    }

    public function show(Productos $producto)
    {
        return $producto;
    }

    public function update(Request $request, Productos $productos)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'categoria' => 'required|exists:categorias,id',
        ]);

        $productos->update($request->all());

        return $productos;
    }

    public function destroy(Productos $productos)
    {
        $productos->delete();

        return response()->noContent();
    }
}