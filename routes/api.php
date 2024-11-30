<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Especie;
use App\Http\Controllers\EspecieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Definir la ruta GET para pbtener todas las especies
Route::get('/especies', [EspecieController::class, 'index']);

// Ruta para obtener un registro específico por ID
Route::get('/especies/{id}', [EspecieController::class, 'showDetails']);

// Ruta para agregar un nuevo registro a la base de datos
Route::post('/especies', [EspecieController::class, 'post']);

// Ruta para actualizar un registro en base a su ID
Route::put('/especies/{id}', [EspecieController::class, 'update']);

// Ruta para eliminar un registro en base a su ID
Route::delete('/especies/{id}', [EspecieController::class, 'delete']);