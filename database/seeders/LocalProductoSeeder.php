<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class localProductoSeeder extends Seeder
{
    public function run(): void
    {
        $locales = DB::table('locales')->pluck('idLocal'); 
        $productos = DB::table('productos')->pluck('idProducto'); 

        $datos = [];

        foreach ($locales as $idLocal) {
            foreach ($productos as $idProducto) {
                $datos[] = [
                    'idLocal' => $idLocal,
                    'idProducto' => $idProducto,
                    'stock' => rand(10, 100) 
                ];
            }
        }
+
        DB::table('local_producto')->insert($datos);
    }
}
