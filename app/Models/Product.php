<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'precio',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }
}