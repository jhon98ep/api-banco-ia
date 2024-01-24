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

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'cliente_solicitante_id');
    }

    public function cuotas()
    {
        return $this->belongsTo(OpcionListaMaestra::class, 'cuotas_solicitadas_id');
    }

    public function estado()
    {
        return $this->belongsTo(OpcionListaMaestra::class, 'estado_id');
    }

    public function tipo_credito()
    {
        return $this->belongsTo(TipoCredito::class, 'tipo_credito_id');
    }
}
