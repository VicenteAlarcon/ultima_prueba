<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Idea;
class IdeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $idea = new Idea();
        $idea->keyword="Servidor";
        $idea->questions="¿Para que puedo utilizar los desarrollos en la parte servidor?";
        $idea->main_ideas="Son fundamentales en un desarrollo web";
        $idea->important_points="servicios web";
        $idea->language_id="es";
        $idea->save();

        $idea = new Idea();
        $idea->keyword="Ecuaciones";
        $idea->questions="¿Que debo practicar para coger soltura con las ecuaciones?";
        $idea->main_ideas="Estudiar los algoritmos de resolución de ecuaciones";
        $idea->important_points="Despejar incógnitas";
        $idea->language_id="en";
        $idea->save();

        $idea = new Idea();
        $idea->keyword="Diseño";
        $idea->questions="¿Como puedo hacer layouts responsive?";
        $idea->main_ideas="Son fundamentales en un desarrollo web";
        $idea->important_points="media_queries";
        $idea->language_id="fr";
        $idea->save();

        $idea = new Idea();
        $idea->keyword="Personalizados";
        $idea->questions="¿Cómo utilizar los servicios personalizados?";
        $idea->main_ideas="Fundamentales en laravel";
        $idea->important_points="servicios web";
        $idea->language_id="va";
        $idea->save();

        $idea = new Idea();
        $idea->keyword="Middleware";
        $idea->questions="¿Cómo implementar un middelware correctamente?";
        $idea->main_ideas="Es necesario estudiarlos en profundiad";
        $idea->important_points="middelware";
        $idea->language_id="es";
        $idea->save();
    }
}