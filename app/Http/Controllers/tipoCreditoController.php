<?php

namespace App\Http\Controllers;

use App\Models\tipoCredito;
use Illuminate\Http\Request;

class tipoCreditoController extends Controller
{
    public function index(Request $request)
    {
        $pagina = $request->query('pagina');
        $registrosPorPagina = 10;
        $datosPaginados = tipoCredito::paginate($registrosPorPagina,  ['*'], 'page', $pagina);
        $datos = tipoCredito::all();
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
        $tipoCredito = tipoCredito::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "tipo de credito creada correctamente!",
            'tipo_credito' => $tipoCredito
        ], 200);
    }

    public function show(string $id)
    {
        $solicitudCredito = tipoCredito::find($id);
        return response()->json([
            'estado' => true,
            'tipo_credito' => $solicitudCredito
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
