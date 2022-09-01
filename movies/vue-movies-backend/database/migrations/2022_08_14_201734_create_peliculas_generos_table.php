<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasGenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas_generos', function (Blueprint $table) {
            $table->id();
            //$table->bigInt('pelicula_id', 20);
            //$table->bigInt('genero_id', 20);
            //$table->foreign('pelicula_id')->references('id')->on('peliculas');
            //$table->foreign('genero_id')->references('id')->on('generos');
            $table->foreignId('pelicula_id')->constrained('peliculas');
            $table->foreignId('genero_id')->constrained('generos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas_generos');
    }
}
