<?php

namespace App\Http\Controllers;

use App\Models\credito;
use Illuminate\Http\Request;

class creditoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditos = credito::all();
        return response()->json([
            'estado' => true,
            'datos' => $creditos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credito = credito::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "credito creado correctamente!",
            'credito' => $credito
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $credito = credito::find($id);
        return response()->json([
            'estado' => true,
            'credito' => $credito
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
