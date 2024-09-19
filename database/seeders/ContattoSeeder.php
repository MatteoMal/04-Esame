<?php

namespace Database\Seeders;

use App\Models\Contatto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Contatto::create([
                "idContatto" => 1,
                "idGruppo" => 1,
                "idStato" => 3,
                "nome" => "Matteo",
                "cognome" => "Malandrino",
                "sesso" => 0,
                "codiceFiscale" => "MLNMTT04L15H501H",
                "partitaIva" => null,
                "cittadinanza" => "Italiana",
                "idNazioneNascita" => "1",
                "cittaNascita" => "Roma",
                "provinciaNascita" => "RM",
                "dataNascita" => "2004-07-15",
            ]);
    }
}
