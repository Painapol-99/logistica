<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class InicioController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        return view('inicio', compact('productos'));
    }
}