<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DescriptionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = \Faker\Factory::create();
         $opcionesValoracion = ['Mejor', 'Primera', 'Segunda'];
    for ($i = 1; $i <= 5; $i++) {
        $usuarioId = $faker->numberBetween(1, 5); // tenemos 5 usuarios
        $descripcionId = $i;

        // Asegurar que el usuario no ha valorado la descripción previamente
        if (!DB::table('description_user')->where('user_id', $usuarioId)->where('description_id', $descripcionId)->exists()) {
            DB::table('description_user')->insert([
                'user_id' => $usuarioId,
                'description_id' => $descripcionId,
                'rating' => $faker->randomElement($opcionesValoracion), 
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    }
}