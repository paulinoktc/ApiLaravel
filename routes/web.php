<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup', function () {
    // Credenciales de admin por defecto
    $credenciales = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];

    // Buscar o crear usuario admin
    $user = User::firstOrCreate(
        ['email' => $credenciales['email']],
        ['name' => 'Admin', 'password' => Hash::make($credenciales['password'])]
    );

    // Autenticar al usuario
    if (!Auth::attempt($credenciales)) {
        return response()->json(['error' => 'Credenciales inválidas'], 401);
    }

    // Generar token de Sanctum con habilidades
    $adminToken = $user->createToken(
        'admin-token',
        ['create', 'update', 'delete'] // abilities
    )->plainTextToken;

    return response()->json([
        'message' => 'Usuario admin listo',
        'token'   => $adminToken
    ]);
});
