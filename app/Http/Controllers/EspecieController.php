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
            return response()->json(['message' => "Especie no encontrada"], 404);
        }

        // Si el registro existe, devolver en formato JSON
        return response()->json($especie);
    } 

        // Función para agregar una nuevo especie
        public function post(Request $request)
        {
            // Validar los datos recibidos
            $request->validate([
                'especie' => 'required|string|max:255',
                'nombre_cientifico' => 'required|string|max:255',
                'descripcion' => 'required|string|max:500',
                'imagen' => 'required|string|max:500',
            ]);
    
            // Crear una nueva película en la base de datos
            $especie = Especie::create([
                'especie' => $request->especie,
                'nombre_cientifico' => $request->nombre_cientifico,
                'descripcion' => $request->descripcion,
                'imagen' => $request->imagen,
            ]);
    
            // Retornar respuesta de éxito
            return response()->json(['message' => 'Especie agregada exitosamente', 'data' => $especie], 201);
    
        }

        // Función para actualizar un registro
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'especie' => 'sometimes|string|max:255', // 'sometimes' significa que es opcional
            'nombre_cientifico' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string|max:500',
            'imagen' => 'sometimes|string|max:500',
        ]);

        // Buscar la película por ID
        $especie = Especie::findOrFail($id);

        // Actualizar los datos de la película
        $especie->update($request->all());

        // Retornar respuesta de éxito
        return response()->json(['message' => 'Especie actualizada exitosamente', 'data' => $especie], 200);
    }

    // Función para eliminar un registro
    public function delete($id)
    {
        // Buscar la película por ID y eliminarla
        $especie = Especie::findOrFail($id);
        $especie->delete();

        // Retornar respuesta de éxito
        return response()->json(['message' => 'Especie eliminada exitosamente'], 200);
    }
}


