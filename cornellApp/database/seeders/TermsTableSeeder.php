<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Term;
use Carbon\Carbon;
class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $fechaAleatoria = Carbon::now()->subDays((rand(1, 365)));

        $term = new term();
        $term->name = "Api";
        $term->date = $fechaAleatoria;
        $term->short_description = "Apuntes  de la primera clase";
        $term->type_id = 3;
        $term->language_id="es";
        $term->save();

           $term = new term();
        $term->name = "Servidor";
        $term->date = $fechaAleatoria;
        $term->short_description = "Apuntes tema 3 servidor";
        $term->type_id = 3;
        $term->language_id="en";
        $term->save();

           $term = new term();
        $term->name = "Usabilidad";
        $term->date = $fechaAleatoria;
        $term->short_description = "Pruebas de usabilidad";
        $term->type_id = 4;
        $term->language_id="va";
        $term->save();

        $term = new term();
        $term->name = "Middleware";
        $term->date = $fechaAleatoria;
        $term->short_description = "Apuntes del tema de Middleware";
        $term->type_id = 3;
        $term->language_id="fr";
        $term->save();

        $term = new term();
        $term->name = "Diw";
        $term->date = $fechaAleatoria;
        $term->short_description = "Apuntes de la última clase";
        $term->type_id = 4;
        $term->language_id="de";
        $term->save();
    }
}