<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->id('idFilm');
            $table->tinyInteger("idCategoria");
            $table->string("titolo", 255);
            $table->string("descrizione", 500);
            $table->tinyInteger("durata");
            $table->string("regista", 45);
            $table->string("attori", 45);
            $table->smallInteger("anno");
            $table->integer("idImmagine");
            $table->integer("idFilmato");
            $table->string("categoria", 255);
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
        Schema::dropIfExists('film');
    }
};
