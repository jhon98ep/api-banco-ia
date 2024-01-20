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
        Schema::create('credito', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_cuenta')->unique();
            $table->foreignId('cliente_solicitante_id')->references('id')->on('usuarios'); 
            $table->foreignId('usuario_aprobador_id')->references('id')->on('usuarios'); 
            $table->foreignId('cuotas_id')->references('id')->on('opcion_lista_maestra'); 
            $table->foreignId('tipo_credito_id')->references('id')->on('tipo_credito'); 
            $table->integer('valor');
            $table->integer('valor_cuota');
            $table->dateTime('fecha_aprobacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credito');
    }
};
