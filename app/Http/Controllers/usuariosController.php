<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\SolicitudCredito;
use App\Models\Usuario;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function index(Request $request)
    {
        $query = Usuario::query();

        if ($request->has('rol_id')) {
            $query->where('rol_id', $request->input('rol_id'));
        }

        if ($request->has('nombre') && $request->has('gerente')) {
            $query->where('rol_id', 3)
                ->orWhere('nombre', 'like', '%' . $request->input('nombre') . '%')
                ->orWhere('usuario', 'like', '%' . $request->input('nombre') . '%')
                ->orWhere('numero_documento', 'like', '%' . $request->input('nombre') . '%');
        }else if($request->has('nombre')) {
            $query->orWhere('nombre', 'like', '%' . $request->input('nombre') . '%')
                ->orWhere('usuario', 'like', '%' . $request->input('nombre') . '%')
                ->orWhere('numero_documento', 'like', '%' . $request->input('nombre') . '%');
        }else if ($request->has('gerente')) {
            $ids = [3];
            $query->whereIn('rol_id', $ids);
        }
        

        $pagina = $request->query('pagina');
        $registrosPorPagina = 10;
        $datosPaginados = $query->with(['rol', 'tipo_documento'])->paginate($registrosPorPagina,  ['*'], 'page', $pagina);
        $datos = $query->with(['rol', 'tipo_documento'])->get();
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
        $request['activo'] = 1;
        $usuario = Usuario::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "usuario creado correctamente!",
            'usuario' => $usuario
        ], 200);
    }

    public function registrarme(Request $request)
    {
        $request['activo'] = 1;
        $request['rol_id'] = 2;
        $usuario = Usuario::create($request->all());

        return response()->json([
            'estado' => true,
            'mensaje' => "usuario creado correctamente!",
            'usuario' => $usuario
        ], 200);
    }

    public function show(string $id)
    {
        $usuario = Usuario::with(['rol', 'tipo_documento'])->find($id);
        return response()->json([
            'estado' => true,
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'usuario' => 'required|unique:usuarios,usuario, '.$id,
            'rol_id' => 'required',
            'tipo_documento_id' => 'required',
            'numero_documento' => 'required|unique:usuarios,numero_documento, '.$id,
        ]);
        $usuario = Usuario::findOrFail($id);
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->usuario = $request->input('usuario');
        $usuario->rol_id = $request->input('rol_id');
        $usuario->tipo_documento_id = $request->input('tipo_documento_id');
        $usuario->numero_documento = $request->input('numero_documento');
        $usuario->save();
        return response()->json([
            'estado' => true,
            'mensaje' => 'Información actualizada con éxito'
        ]);
    }

    public function cambiarActivo(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->activo = !$usuario->activo;
        $usuario->save();
        return response()->json([
            'estado' => true,
            'mensaje' => 'Información actualizada con éxito'
        ]);
    }
}
