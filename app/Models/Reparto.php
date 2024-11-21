<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparto extends Model
{
    use HasFactory;

    protected $fillable = ['idPedido', 'idRepartidor', 'fecha'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idPedido');
    }

    public function repartidor()
    {
        return $this->belongsTo(User::class, 'idRepartidor');
    }
}
