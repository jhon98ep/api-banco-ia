<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaMaestra extends Model
{
    use HasFactory;

    protected $table = "lista_maestra";

    protected $fillable = [
        'nombre',
        'etiqueta',
        'activo',
    ];
}
