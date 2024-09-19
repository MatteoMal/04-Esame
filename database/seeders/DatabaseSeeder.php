<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\ComuneItaliano;
use App\Models\Credito;
use App\Models\Episodio;
use App\Models\Film;
use App\Models\Gruppo;
use App\Models\Recapito;
use App\Models\SerieTv;
use App\Models\Stato;
use App\Models\TipologiaRecapito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
              //ComuniItalianiTableSeeder::class,
              //NazioniTableSeeder::class,
              //TipologiaIndirizziSeederTable::class,
              //ContattoSeeder::class,
              //IndirizzoSeeder::class,
              //FilmSeeder::class,
              //SerieTvSeeder::class,
              //EpisodioSeeder::class,
              //CategoriaSeeder::class,
              //TipologiaRecapitiSeeder::class,
              //StatoSeeder::class,
              //GruppoSeeder::class,
              //ConfigurazioniSeeder::class,
              //PasswordSeeder::class,
              //CreditoSeeder::class,
              ContattiAbilitaSeeder::class
        ]);
    }
}
