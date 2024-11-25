<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;

class EspecieController extends Controller
{
    //Función GET de todas las especies
    public function index()
    {
        // Obtener todas las especies desde el modelo Especie
        $especies = Especie::all();

        // Retornar las especies en formato JSON
        return response()->json($especies);

    }

    // Función para obtemer una especie en específico
    public function showDetails($id) {
        // Buscar la especie por su ID
        $especie = Especie::find($id);

        // Si el registro no existe, devolver un error 404
        if(!$especie) {
            return response()->json(['message' => "Película no encontrada"], 404);
        }

        // Si el registro existe, devolver en formato JSON
        return response()->json($especie);
    } 
}
