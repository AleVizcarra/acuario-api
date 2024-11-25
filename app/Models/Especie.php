<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;
    
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'especie',      // Nombre de la especie
        'nombre_científico', //Nombre científico de la especie
        'descripcion',  // Descripción de la especie
        'imagen',       // URL de la imagen
    ];
}
