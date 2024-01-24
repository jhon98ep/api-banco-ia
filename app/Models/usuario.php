<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "usuarios";

    protected $fillable = [
        'rol_id',
        'tipo_documento_id',
        'nombre',
        'apellido',
        'usuario',
        'contrasenia',
        'numero_documento',
        'activo',
    ];

    protected $hidden = [
        'contrasenia',
        'remember_token',
    ];

    
    protected $casts = [
        'contrasenia' => 'hashed',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function tipo_documento()
    {
        return $this->belongsTo(OpcionListaMaestra::class, 'tipo_documento_id');
    }
}
