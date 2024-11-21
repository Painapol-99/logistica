<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('productos')->insert([
            ['idproducto' => 1, 'nombreProducto' => 'Refresco de cola', 'precio' => 3.00, 'descripcion' => 'Bebida refrescante de cola, ideal para acompañar tus comidas.'],
            ['idproducto' => 2, 'nombreProducto' => 'Refresco de naranja', 'precio' => 2.00, 'descripcion' => 'Refresco con sabor a naranja, perfecto para cualquier ocasión.'],
            ['idproducto' => 3, 'nombreProducto' => 'Zumo de naranja', 'precio' => 2.00, 'descripcion' => 'Jugo natural de naranja, lleno de vitamina C.'],
            ['idproducto' => 4, 'nombreProducto' => 'Barrita de chocolate', 'precio' => 4.00, 'descripcion' => 'Deliciosa barrita de chocolate para darte energía.'],
            ['idproducto' => 5, 'nombreProducto' => 'Donut rosa', 'precio' => 2.00, 'descripcion' => 'Dona glaseada de color rosa, dulce y esponjosa.'],
            ['idproducto' => 6, 'nombreProducto' => 'Mechero', 'precio' => 11.00, 'descripcion' => 'Encendedor portátil para uso diario.'],
            ['idproducto' => 7, 'nombreProducto' => 'Paquete de tabaco', 'precio' => 11.00, 'descripcion' => 'Paquete de tabaco clásico.'],
            ['idproducto' => 8, 'nombreProducto' => 'Chicles de menta', 'precio' => 1.00, 'descripcion' => 'Chicles con sabor a menta para un aliento fresco.'],
            ['idproducto' => 9, 'nombreProducto' => 'Sandwich', 'precio' => 8.00, 'descripcion' => 'Sandwich clásico de jamón y queso.'],
            ['idproducto' => 10, 'nombreProducto' => 'Sandwich de queso', 'precio' => 5.00, 'descripcion' => 'Sandwich simple con queso derretido.'],
            ['idproducto' => 11, 'nombreProducto' => 'Rascas', 'precio' => 5.00, 'descripcion' => 'Tarjetas de rasca y gana, prueba tu suerte.'],
            ['idproducto' => 12, 'nombreProducto' => 'Refresco sprunk', 'precio' => 2.00, 'descripcion' => 'Refresco energizante, sabor único.'],
            ['idproducto' => 13, 'nombreProducto' => 'Refresco sprunk light', 'precio' => 2.00, 'descripcion' => 'Versión light del refresco sprunk.'],
            ['idproducto' => 14, 'nombreProducto' => 'Zumo de manzana', 'precio' => 2.00, 'descripcion' => 'Jugo de manzana refrescante y saludable.'],
            ['idproducto' => 15, 'nombreProducto' => 'Barrita de chocolate meteorite', 'precio' => 4.00, 'descripcion' => 'Barrita de chocolate con extra de sabor y textura.'],
            ['idproducto' => 16, 'nombreProducto' => 'Barrita de chocolate captains', 'precio' => 4.00, 'descripcion' => 'Barrita de chocolate de edición especial.'],
            ['idproducto' => 17, 'nombreProducto' => 'Paquete de tabaco cardiaque', 'precio' => 11.00, 'descripcion' => 'Paquete de tabaco con un toque especial.'],
            ['idproducto' => 18, 'nombreProducto' => 'Chicles de fresa', 'precio' => 1.00, 'descripcion' => 'Chicles con sabor a fresa, dulce y suave.'],
            ['idproducto' => 19, 'nombreProducto' => 'Caipiriña', 'precio' => 2.00, 'descripcion' => 'Cóctel brasileño con un toque de lima.'],
            ['idproducto' => 20, 'nombreProducto' => 'Mojito', 'precio' => 5.00, 'descripcion' => 'Cóctel refrescante con menta y lima.'],
            ['idproducto' => 21, 'nombreProducto' => 'San Francisco', 'precio' => 5.00, 'descripcion' => 'Cóctel sin alcohol con sabores tropicales.'],
            ['idproducto' => 22, 'nombreProducto' => 'Irish Flag', 'precio' => 4.00, 'descripcion' => 'Cóctel de capas con los colores de Irlanda.'],
            ['idproducto' => 23, 'nombreProducto' => 'Aceitunas', 'precio' => 2.00, 'descripcion' => 'Aceitunas verdes perfectas para acompañar aperitivos.'],
            ['idproducto' => 24, 'nombreProducto' => 'Mai Tai', 'precio' => 5.00, 'descripcion' => 'Cóctel hawaiano con ron y frutas tropicales.'],
            ['idproducto' => 25, 'nombreProducto' => 'Piña colada', 'precio' => 5.00, 'descripcion' => 'Cóctel dulce con piña y coco, típico de las playas.'],
        ]);
    }
}
