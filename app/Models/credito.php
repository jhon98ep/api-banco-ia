<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $table = "credito";

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($credito) {
            $credito->numero_cuenta= static::generarNumeroCuenta();
        });
    }

    protected static function generarNumeroCuenta()
    {
        return str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
    }

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'cliente_solicitante_id');
    }

    public function aprobador()
    {
        return $this->belongsTo(Usuario::class, 'usuario_aprobador_id');
    }

    public function cuotas()
    {
        return $this->belongsTo(OpcionListaMaestra::class, 'cuotas_id');
    }

    public function tipo_credito()
    {
        return $this->belongsTo(TipoCredito::class, 'tipo_credito_id');
    }
}
