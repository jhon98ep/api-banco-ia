<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitud_credito', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_solicitante_id')->references('id')->on('usuarios'); 
            $table->foreignId('cuotas_solicitadas_id')->references('id')->on('opcion_lista_maestra'); 
            $table->foreignId('estado_id')->references('id')->on('opcion_lista_maestra'); 
            $table->foreignId('tipo_credito_id')->references('id')->on('tipo_credito'); 
            $table->integer('valor_solicitado');
            $table->string('descripcion');
            $table->dateTime('fecha_solicitud');
            $table->string('observaciones');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_credito');
    }
};
