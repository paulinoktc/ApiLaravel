<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Http\Resources\ClientesCollection;
use App\Http\Resources\ClientesResource;
use App\Models\Clientes;
use GuzzleHttp\Client;
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
    public function store(Request $request)
    {
        return Clientes::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $cliente)
    {
        //
        //return $cliente;
        return new ClientesResource($cliente);
        // return new ClientesResource($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $cliente)
    {
        //
        return new  ClientesResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clientes $cliente)
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
