<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RepartoSeeder extends Seeder
{
    public function run(): void
    {
        $pedidos = DB::table('pedidos')->pluck('id');
        $repartidores = DB::table('users')->where('repartidor', true)->pluck('id');

        foreach ($pedidos as $idPedido) {
            DB::table('reparto')->insert([
                'idPedido' => $idPedido,
                'idRepartidor' => $repartidores->random(),
                'fecha' => Carbon::now()->subDays(rand(1, 10)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
