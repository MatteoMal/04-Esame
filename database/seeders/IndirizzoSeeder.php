<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Indirizzo;

class IndirizzoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indirizzo::create([
            "idContatto" => 1,
            "idTipologiaIndirizzo" => 1,
            "idNazione" => 1,
            "idComuneItaliano" => "272",
            "indirizzo" => "Piazza Roma",
            "civico" => 6,
            "cap" => 10064,
            "localita" => null,
            "comune" => "Torino"
        ]);

        Indirizzo::create([
            "idContatto" => 1,
            "idTipologiaIndirizzo" => 2,
            "idNazione" => 1,
            "idComuneItaliano" => "5271",
            "indirizzo" => "Via palestro",
            "civico" => 16,
            "cap" => 10090,
            "localita" => null,
            "comune" => "Roma"
        ]);

        Indirizzo::create([
            "idContatto" => 2,
            "idTipologiaIndirizzo" => 1,
            "idNazione" => 10,
            "idComuneItaliano" => "6097",
            "indirizzo" => "Via da qui",
            "civico" => '8/b',
            "cap" => 12010,
            "localita" => null,
            "comune" => "Napoli"
        ]);
    }
}
