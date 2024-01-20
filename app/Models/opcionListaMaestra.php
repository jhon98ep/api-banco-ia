<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opcionListaMaestra extends Model
{
    use HasFactory;

    protected $fillable = [
        'lista_maestra_id',
        'nombre',
        'etiqueta',
        'activo',
    ];
}
