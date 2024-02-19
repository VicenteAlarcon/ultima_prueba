<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Description;
class DescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $description = new Description();
      $description->title ="servidor";
      $description->notes ="Estudiar los servicios web";
      $description->summary="Este es el resumen de los apuntes de la asignatura de Servidor y muchas cosas más";
      $description->objectives="Aprobar el examen";
      $description->term_id=2;
      $description->user_id=1;
      $description->language_id="de";
      $description->save();


      $description = new Description();
      $description->title ="Api";
      $description->notes ="Implmentación api";
      $description->summary="Para asegurarme la mejor nota debo repasar las implementaciones de las Api";
      $description->objectives="Aprobar el examen";
      $description->term_id=1;
      $description->user_id=3;
      $description->language_id="es";
      $description->save();

      $description = new Description();
      $description->title ="Repaso Diw";
      $description->notes ="Repasar todo los temas de usabilidad";
      $description->summary="Si quiero aprobar en la extraordinaria debo repasarme todos los temas";
      $description->objectives="Aprobar en extraordinaria";
      $description->term_id=4;
      $description->user_id=2;
      $description->language_id="en";
      $description->save();

      $description = new Description();
      $description->title ="Apuntes de servicios personalizados";
      $description->notes ="Puede salir en el examen";
      $description->summary="Debo repasar la implementación de los servicios personalizados";
      $description->objectives="Aprender a crear servicios";
      $description->term_id=3;
      $description->user_id=5;
      $description->language_id="fr";
      $description->save();

      $description = new Description();
      $description->title ="Responsive";
      $description->notes ="Seguramente sale en examen";
      $description->summary="Estudiar los diseños responsive tanto para la evaluable como para el examen";
      $description->objectives="Implementar páginas responsive correctamente";
      $description->term_id=5;
      $description->user_id=4;
      $description->language_id="va";
      $description->save();
    }
}