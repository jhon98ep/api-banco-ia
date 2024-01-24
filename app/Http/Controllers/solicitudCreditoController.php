<?php

namespace App\Http\Controllers;

use App\Models\OpcionListaMaestra;
use App\Models\solicitudCredito;
use App\Models\TipoCredito;
use Illuminate\Http\Request;

class solicitudCreditoController extends Controller
{
    protected $credito;

    public function __construct(creditoController $credito)
    {
        $this->credito = $credito;
    }

    public function index(Request $request)
    {
        $query = solicitudCredito::query();
        
        if ($request->has('cliente_solicitante_id')) {
            $query->where('cliente_solicitante_id', $request->input('cliente_solicitante_id'));
        }

        if ($request->has('estado_id')) {
            $query->where('estado_id', $request->input('estado_id'));
        }

        if ($request->has('tipo_credito_id')) {
            $query->where('tipo_credito_id', $request->input('tipo_credito_id'));
        }

        $pagina = $request->query('pagina');
        $registrosPorPagina = 10;

        $datosPaginados = $query->with(['cliente', 'cuotas', 'estado','tipo_credito'])->paginate($registrosPorPagina,  ['*'], 'page', $pagina);
        $datos = $query->with(['cliente', 'cuotas', 'estado','tipo_credito'])->get();
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
        $datos = $request->validate([
            'cliente_solicitante_id' => 'required',
            'cuotas_solicitadas_id' => 'required',
            'tipo_credito_id' => 'required',
            'descripcion' => 'required',
            'valor_solicitado' => 'required',
        ]);

        $request['observaciones'] = '-';
        $request['fecha_solicitud'] = now();
        $request['estado_id'] = 1;
        $solicitudCredito = solicitudCredito::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "solicitud de credito creada correctamente!",
            'solicitud' => $solicitudCredito
        ], 200);
    }

    public function show(string $id)
    {
        $solicitudCredito = solicitudCredito::with(['cliente', 'cuotas', 'estado','tipo_credito'])->find($id);
        return response()->json([
            'estado' => true,
            'solicitud' => $solicitudCredito
        ]);
    }

    public function update(Request $request, string $id)
    {
        
        $solicitud = solicitudCredito::findOrFail($id);
        $tipo_credito = TipoCredito::find($solicitud->tipo_credito_id);
        $cuotas = OpcionListaMaestra::find($solicitud->cuotas_solicitadas_id);
        $solicitud->observaciones = $request->observaciones;
        $solicitud->estado_id = $request->estado_id;
        $solicitud->cliente_solicitante_id = $request->cliente_solicitante_id;
        if($solicitud->estado_id == 4){
            $i = $tipo_credito->porcentaje_interes/100;
            $c = $cuotas->etiqueta;
            $vs = $solicitud->valor_solicitado;
            $vc = ($vs * $i) / (1 - (pow((1 + $i), (-$c))));
            $credito_request = new Request([
                'cliente_solicitante_id' => $solicitud->cliente_solicitante_id,
                'usuario_aprobador_id' =>  $request->usuario_aprobador_id,
                'cuotas_id' => $solicitud->cuotas_solicitadas_id,
                'tipo_credito_id' => $solicitud->tipo_credito_id,
                'valor' => $solicitud->valor_solicitado,
                'valor_cuota' => $vc,
                'fecha_aprobacion' => now(),
            ]);
            $this->credito->store($credito_request);
        }
        $solicitud->save();
        return response()->json([
            'estado' => true,
            'mensaje' => 'Información actualizada con éxito'
        ]);
    }

    public function cambiarEstado(Request $request, string $id)
    {
        $solicitud = solicitudCredito::findOrFail($id);
        $solicitud->estado_id = $request->estado_id;
        $solicitud->save();
        return response()->json([
            'estado' => true,
            'mensaje' => 'Información actualizada con éxito'
        ]);
    }

}
