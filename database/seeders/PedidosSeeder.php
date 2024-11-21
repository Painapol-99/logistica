<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidosSeeder extends Seeder
{
    public function run(): void
    {
        $locales = DB::table('locales')->pluck('id');
        $productos = DB::table('productos')->pluck('id');
        
        foreach ($locales as $idLocal) {
            foreach ($productos as $idProducto) {
                DB::table('pedidos')->insert([
                    'idLocal' => $idLocal,
                    'idProducto' => $idProducto,
                    'cantidad' => rand(1, 50),
                    'fecha' => Carbon::now()->subDays(rand(1, 30)),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
