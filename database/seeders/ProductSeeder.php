<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            ['nombre' => 'Coca Cola', 'precio' => 1.50, 'categoria_id' => 1],
            ['nombre' => 'Pepsi', 'precio' => 1.50, 'categoria_id' => 1],
            ['nombre' => 'Pizza Margarita', 'precio' => 8.00, 'categoria_id' => 2],
            ['nombre' => 'Pizza Pepperoni', 'precio' => 9.00, 'categoria_id' => 2],
            ['nombre' => 'Agua Mineral', 'precio' => 1.00, 'categoria_id' => 1],
            ['nombre' => 'Hamburguesa', 'precio' => 5.00, 'categoria_id' => 3],
            ['nombre' => 'Papas Fritas', 'precio' => 2.00, 'categoria_id' => 3],
        ]);
    }
}
