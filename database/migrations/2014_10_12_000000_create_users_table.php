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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id')->references('id')->on('roles'); 
            $table->foreignId('tipo_documento_id')->references('id')->on('opcion_lista_maestra'); 
            $table->string('nombre');
            $table->string('apellido');
            $table->string('usuario')->unique();
            $table->string('contrasenia');
            $table->string('numero_documento')->unique();
            $table->integer('activo');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
