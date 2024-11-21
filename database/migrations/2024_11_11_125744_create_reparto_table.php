<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('reparto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPedido')->constrained('pedidos')->onDelete('cascade');
            $table->foreignId('idRepartidor')->constrained('users')->onDelete('cascade');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparto');
    }
};
