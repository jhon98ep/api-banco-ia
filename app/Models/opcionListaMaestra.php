<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionListaMaestra extends Model
{
    use HasFactory;

    protected $table = "opcion_lista_maestra";

    protected $fillable = [
        'lista_maestra_id',
        'nombre',
        'etiqueta',
        'activo',
    ];
}
