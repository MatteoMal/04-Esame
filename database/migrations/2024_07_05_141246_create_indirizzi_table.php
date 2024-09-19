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
        Schema::create('indirizzi', function (Blueprint $table) {
            $table->id('idIndirizzo');$table->unsignedBigInteger('idContatto');$table->unsignedBigInteger('idTipologiaIndirizzo');$table->unsignedBigInteger('idNazione');$table->unsignedBigInteger('idComuneItaliano');$table->string('cap',15)->nullable();$table->string('comune',255);$table->string('indirizzo',255);$table->string('civico',15)->nullable();$table->string('localita',255)->nullable();$table->softDeletes();$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indirizzi');
    }
};
