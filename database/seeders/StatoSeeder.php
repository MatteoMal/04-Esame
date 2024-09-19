<?php

namespace Database\Seeders;

use App\Models\Stato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stato::create([
            "idStato" => "1",
            "nome" => "Bannato"
        ]);
        Stato::create([
            "idStato" => "2",
            "nome" => "In sospeso"
        ]);
    }
}
