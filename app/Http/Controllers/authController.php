<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function login(Request $request)
    {
        $user= Usuario::where('usuario', $request->usuario)
                        ->where('activo', '=', 1)
                        ->first();
        if (!$user || !Hash::check($request->contrasenia, $user->contrasenia)) {
            return response([
                'estado' => false,
                'mensaje' => ['Las credenciales no son validas.']
            ], 404);
        }
    
        $token = $user->createToken('my-app-token')->plainTextToken;       
        $response = [
            'estado' => true,
            'usuario' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function validarLogin(Request $request){
        return $request->validate([
            'usuario' => 'required',
            'contrasenia' => 'required',
        ]);
    }
}
