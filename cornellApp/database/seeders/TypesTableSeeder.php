<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo = new Type();
        $tipo->type = 'Profesor';
        $tipo->model = 'Usuario';
        $tipo->save();

        $tipo = new Type();
        $tipo->type = 'Alumno';
        $tipo->model = 'Usuario';
        $tipo->save();

        $tipo = new Type();
        $tipo->type = 'DWES';
        $tipo->model = 'Término';
        $tipo->save();

        $tipo = new Type();
        $tipo->type = 'DIW';
        $tipo->model = 'Término';
        $tipo->save();

    }
}