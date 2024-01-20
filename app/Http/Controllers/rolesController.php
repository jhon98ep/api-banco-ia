<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = roles::all();
        return response()->json([
            'estado' => true,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = roles::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "Rol creado correctamente!",
            'rol' => $rol
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = roles::find($id);
        return response()->json([
            'estado' => true,
            'rol' => $rol
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
