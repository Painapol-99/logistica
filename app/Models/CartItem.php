<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'idProducto',
        'cantidad',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
?>