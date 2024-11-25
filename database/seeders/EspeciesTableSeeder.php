<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especie;

class EspeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Limpiar la tabla antes de insertar nuevos datos
        Especie::truncate();

        // Crear una instancia de Faker
        $faker = \Faker\Factory::create();

        // Llenar la tabla con 5 registros de prueba
        for($i = 0; $i < 5; $i++) {
            Especie::create ([
                'especie' => $faker->sentence,      
                'nombre_científico' => $faker->sentence, 
                'descripcion' => $faker->paragraph,
                'imagen' => $faker->imageUrl(),     
            ]);
        }
    }
}
