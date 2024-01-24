<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class rolesController extends Controller
{
    public function index(Request $request)
    {
        $query = Rol::query();
    
        if ($request->has('gerente')) {
            $ids = [3];
            $query->whereIn('id', $ids);
        }

        $pagina = $request->query('pagina');

        $registrosPorPagina = 10;
        $datosPaginados =$query->paginate($registrosPorPagina,  ['*'], 'page', $pagina);
        $datos = $query->get();
        return response()->json([
            'estado' => true,
            'total_registros' => $datosPaginados->total(),
            'pagina_actual' => $pagina == -1 ? 1 : $datosPaginados->currentPage(),
            'total_paginas' => $pagina == -1 ? 1 : $datosPaginados->lastPage(),
            'datos' => $pagina == -1 ? $datos : $datosPaginados->items(),
        ]);
    }

    public function store(Request $request)
    {
        $rol = Rol::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "Rol creado correctamente!",
            'rol' => $rol
        ], 200);
    }

    public function show(string $id)
    {
        $rol = Rol::find($id);
        return response()->json([
            'estado' => true,
            'rol' => $rol
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }
}
