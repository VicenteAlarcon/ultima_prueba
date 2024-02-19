<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $faker = \Faker\Factory::create();

        // Crear registros en la tabla pivote
        for ($i = 0; $i < 5; $i++) {
            DB::table('term_user')->insert([
                'term_id' => $faker->numberBetween(1, 5),
                'user_id' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
              
            ]);
    }
    }
}