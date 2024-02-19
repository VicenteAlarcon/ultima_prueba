<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('description_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('description_id')->index();
            $table->foreign('description_id')->references('id')->on('descriptions')->onDelete('cascade');
            $table->timestamps();
          
            // Atributos adicionales de la tabla pivote usados por el alumno(valoración y fecha)
            $table->string('rating');
            $table->date('date'); 

            // Hacemos que una misma descripción solo pueda ser valorada una vez.
            $table->unique(['user_id', 'description_id']);
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('description_user');
    }
};