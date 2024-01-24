<?php

namespace App\Http\Controllers;

use App\Models\credito;
use Illuminate\Http\Request;

class creditoController extends Controller
{
    public function index(Request $request)
    {
        $query = credito::query();
        
        if ($request->has('cliente_solicitante_id')) {
            $query->where('cliente_solicitante_id', $request->input('cliente_solicitante_id'));
        }

        $pagina = $request->query('pagina');
        $registrosPorPagina = 10;

        $datosPaginados = $query->with(['cliente', 'aprobador', 'cuotas', 'tipo_credito'])->paginate($registrosPorPagina,  ['*'], 'page', $pagina);
        $datos = $query->with(['cliente', 'aprobador', 'cuotas', 'tipo_credito'])->get();
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
        $credito = credito::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "credito creado correctamente!",
            'credito' => $credito
        ], 200);
    }

    public function show(string $id)
    {
        $credito = credito::find($id);
        return response()->json([
            'estado' => true,
            'credito' => $credito
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }
}
