<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class localesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('locales')->insert([
            [
                'nombreLocal' => 'Desavío la toñi', 
                'direccion' => 'Calle Bormujos 47, Sevilla', 
                'tipo' => 'supermercado', 
                'telefono' => '633456689'
            ],
            [
                'nombreLocal' => 'Desavío Postigo', 
                'direccion' => 'Calle Flor de Gitanilla 17, Sevilla Este, Sevilla', 
                'tipo' => 'supermercado', 
                'telefono' => '625656987'
            ],
            [
                'nombreLocal' => 'Bar los barros', 
                'direccion' => 'Calle Alegría 24, Sevilla', 
                'tipo' => 'bar', 
                'telefono' => '653873498'
            ],
            [
                'nombreLocal' => 'Bar casa paco martos', 
                'direccion' => 'C. el Peso, 42, Constantina, Sevilla', 
                'tipo' => 'bar', 
                'telefono' => '645365214'
            ],
        ]);
    }
}
