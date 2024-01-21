<?php

namespace App\Http\Controllers;

use App\Models\OpcionListaMaestra;
use Illuminate\Http\Request;

class opcionListaMaestraController extends Controller
{
    public function index(string $lista_maestra_id)
    {
        $opcionlistaMaestra = OpcionListaMaestra::where('lista_maestra_id', $lista_maestra_id)->get();
        return response()->json([
            'estado' => true,
            'datos' => $opcionlistaMaestra
        ]);
    }

    public function store(Request $request)
    {
        $opcionlistaMaestra = OpcionListaMaestra::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "Opcion creada correctamente!",
            'opcion' => $opcionlistaMaestra
        ], 200);
    }

    public function show(string $id)
    {
        $opcionlistaMaestra = OpcionListaMaestra::find($id);
        return response()->json([
            'estado' => true,
            'opcion' => $opcionlistaMaestra
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
