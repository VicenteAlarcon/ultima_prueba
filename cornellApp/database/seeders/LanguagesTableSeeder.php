<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language = new Language();
        $language->iso_code ="es";
        $language->name="Español";
        $language->save();

         $language = new Language();
        $language->iso_code ="en";
        $language->name="English";
        $language->save();

         $language = new Language();
        $language->iso_code ="va";
        $language->name="Valencià";
        $language->save();

         $language = new Language();
        $language->iso_code ="fr";
        $language->name="French";
        $language->save();

         $language = new Language();
        $language->iso_code ="de";
        $language->name="Deutsch";
        $language->save();
    }
}