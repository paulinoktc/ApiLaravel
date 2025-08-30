<?php

namespace App\Http\Controllers;

//use App\Http\Resources\ContratosCollection;

use App\Http\Resources\ContratosCollection;
use App\Models\Contratos;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return new ContratosCollection(Contratos::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Generar número de contrato
        $numeroContrato = $this->generarCodigoConFecha($request->cliente_id);

        // Crear el contrato con todos los datos + numero_contrato
        $contrato = Contratos::create(array_merge(
            $request->all(),
            ['numero_contrato' => $numeroContrato]
        ));

        return $contrato;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

    function generarCodigoConFecha(string $prefijo): string
    {
        // Fecha actual con milisegundos
        $fecha = Carbon::now('America/Mexico_City')->format('YmdHisv');

        // Concatenar prefijo + fecha
        return $prefijo . $fecha;
    }
}
