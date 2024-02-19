<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $user = new User();
         $user->first_name = 'Vicente';
         $user->last_name = 'Alarcón';
         $user->email = 'vicente@msn.com';
         $user->password = '1234';
         $user->user_name = 'vicen';
         $user->type_id = '1';
         $user->email_verified_at = now();
         $user->remember_token = Str::random(10);
         $user->save();

         $user = new User();
         $user->first_name = 'Andrés';
         $user->last_name = 'Pérez';
         $user->email = 'andres@msn.com';
         $user->password = 'andresito';
         $user->user_name = 'andriu';
         $user->type_id = '1';
         $user->email_verified_at = now();
         $user->remember_token = Str::random(10);
         $user->save();

         $user = new User();
         $user->first_name = 'Sara';
         $user->last_name = 'Alarcón';
         $user->email = 'sara@gmail.com';
         $user->password = 'taretas';
         $user->user_name = 'sari';
         $user->type_id = '1';
         $user->email_verified_at = now();
         $user->remember_token = Str::random(10);
         $user->save();

        $user = new User();
        $user->first_name = 'Juan';
        $user->last_name = 'Martínez';
        $user->email = 'juanito@hotmail.com';
        $user->password = 'asdfasdf';
        $user->user_name = 'anju';
        $user->type_id = '2';
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

        $user = new User();
        $user->first_name = 'Paco';
        $user->last_name = 'Alarcón';
        $user->email = 'pakiyo@msn.com';
        $user->password = 'rrrttt';
        $user->user_name = 'frank';
        $user->type_id = '2';
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

      
    }
}