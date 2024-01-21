<?php

namespace App\Http\Controllers;

use App\Models\ListaMaestra;
use Illuminate\Http\Request;

class listaMaestraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaMaestra = ListaMaestra::all();
        return response()->json([
            'estado' => true,
            'datos' => $listaMaestra
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $listaMaestra = ListaMaestra::create($request->all());

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
        $listaMaestra = ListaMaestra::find($id);
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
