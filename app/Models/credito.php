<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_cuenta',
        'cliente_solicitante_id',
        'usuario_aprobador_id',
        'cuotas_id',
        'tipo_credito_id',
        'valor',
        'valor_cuota',
        'fecha_aprobacion',
    ];
}
