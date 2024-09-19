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
        Schema::create('serie_tv', function (Blueprint $table) {
            $table->id('idSerieTv');
            $table->tinyInteger('idCategoria');
            $table->string('nome', 255);
            $table->string('descrizione', 45);
            $table->tinyInteger('totaleStagioni');
            $table->tinyInteger('numeroEpisodio');
            $table->string('regista', 45);
            $table->string('attori', 45);
            $table->smallInteger('annoInizio');
            $table->smallInteger('annoFine');
            $table->unsignedBigInteger('idImmagine');
            $table->unsignedBigInteger('idFilmato');
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
        Schema::dropIfExists('serie_tv');
    }
};
