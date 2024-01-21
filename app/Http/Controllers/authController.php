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
        /* $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt(['usuario' => $credentials['usuario'], 'contrasenia' => $credentials['contrasenia'], 'activo' => 1])) {
            $usuario = Usuario::where('usuario', $request->usuario)->first();
            $token = $usuario->createToken('token-prueba')->plainTextToken;
            $response = [
                'user' => $usuario,
                'token' => $token
            ];
            return response($response, 201);
        } else {
            return response()->json(['mensaje' => 'Credenciales invalidas'], 401);
        } */
        $user= Usuario::where('usuario', $request->usuario)->first();
            if (!$user || !Hash::check($request->contrasenia, $user->contrasenia)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
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
