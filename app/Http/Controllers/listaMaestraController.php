<?php

namespace App\Http\Controllers;

use App\Models\listaMaestra;
use Illuminate\Http\Request;

class listaMaestraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaMaestra = listaMaestra::all();
        return response()->json([
            'estado' => true,
            'listas' => $listaMaestra
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $listaMaestra = listaMaestra::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "Lista creada correctamente!",
            'lista' => $listaMaestra
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listaMaestra = listaMaestra::find($id);
        return response()->json([
            'estado' => true,
            'lista' => $listaMaestra
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
