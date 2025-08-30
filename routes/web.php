<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContratosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
