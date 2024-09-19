<?php

namespace Database\Seeders;

use App\Models\TipologiaRecapito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipologiaRecapitiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipologiaRecapito::create(["idTipologiaRecapito" => 1,"nome" => "Numero telefonico"]);
        TipologiaRecapito::create(["idTipologiaRecapito" => 2, "nome" => "Email"]);
    }
}
