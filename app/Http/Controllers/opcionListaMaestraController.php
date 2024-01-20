<?php

namespace App\Http\Controllers;

use App\Models\opcionListaMaestra;
use Illuminate\Http\Request;

class opcionListaMaestraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $lista_maestra_id)
    {
        $opcionlistaMaestra = opcionListaMaestra::find($lista_maestra_id);
        return response()->json([
            'estado' => true,
            'datos' => $opcionlistaMaestra
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $opcionlistaMaestra = opcionListaMaestra::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "Opcion creada correctamente!",
            'opcion' => $opcionlistaMaestra
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $opcionlistaMaestra = opcionListaMaestra::find($id);
        return response()->json([
            'estado' => true,
            'opcion' => $opcionlistaMaestra
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
