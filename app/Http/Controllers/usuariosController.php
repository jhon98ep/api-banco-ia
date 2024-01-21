<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json([
            'estado' => true,
            'datos' => $usuarios
        ]);
    }

    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "usuario creado correctamente!",
            'usuario' => $usuario
        ], 200);
    }

    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        return response()->json([
            'estado' => true,
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }
}
