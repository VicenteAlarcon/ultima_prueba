<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // $faker = \Faker\Factory::create('es_ES'); // Establecer el idioma español

        // \App\Models\Description::factory(5)->create();
            
         $this->call([   
            LanguagesTableSeeder::class,
            TypesTableSeeder::class,
            UsersTableSeeder::class,
            TermsTableSeeder::class,
            TermUserTableSeeder::class,
            DescriptionsTableSeeder::class,
            IdeasTableSeeder::class,
            DescriptionIdeaTableSeeder::class,
            DescriptionUserTableSeeder::class,
         
         ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}