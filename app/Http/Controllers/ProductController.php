<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $productos = Product::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    public function apiIndex()
    {
        return Product::with('categoria')->get();
    }
}