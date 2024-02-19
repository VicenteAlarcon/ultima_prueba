<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DescriptionIdeaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              $faker = \Faker\Factory::create();
              $now = now();

        // Crear registros en la tabla pivote
         for ($i = 1; $i <= 5; $i++) {
        DB::table('description_idea')->insert([
            'description_id' => $i,
            'idea_id' => $i,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
           
    
    }
}