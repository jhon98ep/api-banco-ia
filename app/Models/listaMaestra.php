<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listaMaestra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'etiqueta',
        'activo',
    ];
}
