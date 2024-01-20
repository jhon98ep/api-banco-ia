<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function index()
    {
        $usuarios = usuario::all();
        return response()->json([
            'estado' => true,
            'datos' => $usuarios
        ]);
    }

    public function store(Request $request)
    {
        $usuario = usuario::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "solicitude de credito creada correctamente!",
            'usuario' => $usuario
        ], 200);
    }

    public function show(string $id)
    {
        $usuario = usuario::find($id);
        return response()->json([
            'estado' => true,
            'usuario' => $usuario
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
