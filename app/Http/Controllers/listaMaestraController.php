<?php

namespace App\Http\Controllers;

use App\Models\ListaMaestra;
use Illuminate\Http\Request;

class listaMaestraController extends Controller
{
    public function index(Request $request)
    {
        $pagina = $request->query('pagina');
        $registrosPorPagina = 10;
        $datosPaginados = ListaMaestra::paginate($registrosPorPagina,  ['*'], 'page', $pagina);
        $datos = ListaMaestra::all();
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
        $listaMaestra = ListaMaestra::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "Lista creada correctamente!",
            'lista' => $listaMaestra
        ], 200);
    }

    public function show(string $id)
    {
        $listaMaestra = ListaMaestra::find($id);
        return response()->json([
            'estado' => true,
            'lista' => $listaMaestra
        ]);
    }

    public function obtenerListaPorNombre(string $nombre)
    {
        $listaMaestra = ListaMaestra::where('nombre', $nombre)->first();
        return response()->json([
            'estado' => true,
            'lista' => $listaMaestra
        ]);
    }

}
