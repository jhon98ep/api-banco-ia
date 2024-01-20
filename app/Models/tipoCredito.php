<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'porcentaje_interes',
        'activo',
    ];
}
