<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['idLocal', 'idProducto', 'cantidad', 'fecha'];

    public function productos()
    {
        return $this->belongsTo(productos::class, 'idProducto');
    }

    public function reparto()
    {
        return $this->hasOne(Reparto::class, 'idPedido');
    }
}
