<?php 
use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema; 
return new class extends Migration 
{ 
public function up(): void 
{ 
Schema::create('Locales', function (Blueprint $table) { 
$table->id('idLocal'); 
            $table->string('nombreLocal', 100); 
            $table->string('direccion', 100);
            $table->string('tipo', 100);
            $table->string('telefono', 100);
            
            $table->timestamps(); 
        }); 
    } 
 
    public function down(): void 
    { 
        Schema::dropIfExists('Locales'); 
    } 
};