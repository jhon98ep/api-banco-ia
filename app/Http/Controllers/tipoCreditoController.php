<?php

namespace App\Http\Controllers;

use App\Models\tipoCredito;
use Illuminate\Http\Request;

class tipoCreditoController extends Controller
{
    public function index()
    {
        $tipoCredito = tipoCredito::all();
        return response()->json([
            'estado' => true,
            'datos' => $tipoCredito
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
