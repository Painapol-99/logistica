<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Reparto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepartoController extends Controller
{
    public function registrarReparto($idPedido)
    {
        Reparto::create([
            'idPedido' => $idPedido,
            'idRepartidor' => Auth::id(), 
            'fecha' => now(),
        ]);

        return redirect()->route('reparto.index')->with('success', 'Reparto registrado correctamente.');
    }
}
