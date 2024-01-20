<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCredito extends Model
{
    use HasFactory;

    protected $table = "solicitud_credito";

    protected $fillable = [
        'cliente_solicitante_id',
        'cuotas_solicitadas_id',
        'estado_id',
        'tipo_credito_id',
        'valor_solicitado',
        'descripcion',
        'fecha_solicitud',
        'observaciones',
    ];
}
