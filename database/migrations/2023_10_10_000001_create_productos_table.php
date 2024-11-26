<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('productos')) {
            Schema::create('productos', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->decimal('precio', 8, 2);
                $table->unsignedBigInteger('categoria_id');
                $table->timestamps();

                $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}