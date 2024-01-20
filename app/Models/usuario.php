<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
}