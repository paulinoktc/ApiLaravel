<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Http\Resources\ClientesCollection;
use App\Http\Resources\ClientesResource;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //return response()->json(['message' => 'first endpoint']);
        return new ClientesCollection(Clientes::all());
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
    public function store(ClientesRequest $request)
    {
        $cliente = Clientes::create($request->validated());

        return response()->json([
            'message' => 'Cliente creado correctamente',
            'data' => $cliente
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $cliente)
    {
        //
        $includeContratos = request()->query('includeContratos');
        if ($includeContratos) {
            return new ClientesResource($cliente->loadMissing('contratos'));
        }
        return new ClientesResource($cliente);
        // return new ClientesResource($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $cliente)
    {
        //
        return new ClientesResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientesRequest $request, Clientes $cliente)
    {

        $cliente->update($request->all());
        $cliente->save();
        return new ClientesResource($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $cliente)
    {
        $cliente->delete();
        return response()->json(null, 200);
    }
}
