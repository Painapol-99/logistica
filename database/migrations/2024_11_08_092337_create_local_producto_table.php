<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalProductoTable extends Migration // Cambia "Createlocal_productoTable" a "CreateLocalProductoTable"
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('local_producto', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('idLocal'); 
            $table->unsignedBigInteger('idProducto'); 
            $table->integer('stock')->default(0); 
            $table->timestamps();

            $table->foreign('idLocal')->references('idLocal')->on('locales')->onDelete('cascade');
            $table->foreign('idProducto')->references('idProducto')->on('productos')->onDelete('cascade');

            $table->unique(['idLocal', 'idProducto']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_producto');
    }
}
