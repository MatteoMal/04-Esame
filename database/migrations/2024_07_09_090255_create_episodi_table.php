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
        Schema::create('episodi', function (Blueprint $table) {
            $table->id('idEpisodio');
            $table->unsignedBigInteger('idSerieTv');
            $table->string('titolo', 255);
            $table->string('descrizione', 45);
            $table->tinyInteger('numeroStagione');
            $table->tinyInteger('numeroEpisodio');
            $table->tinyInteger('durata');
            $table->smallInteger('anno');
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
        Schema::dropIfExists('episodi');
    }
};
