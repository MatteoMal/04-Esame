<?php

namespace Database\Seeders;

use App\Models\SerieTv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieTvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SerieTv::create([
            "idSerieTv" => "1",
            "idCategoria" => "1",
            "nome" => "Donec efficitur",
            "descrizione" => "Libero in pharetra imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris at sem enim. Nulla sagittis risus vestibulum auctor cursus.",
            "totaleStagioni" => "5",
            "numeroEpisodio" => "1",
            "regista" => "Leonardo Colombo",
            "attori" => "Tommaso Bruno e Mattia Ricci",
            "annoInizio" => "2013",
            "annoFine" => "2015",
            "idImmagine" => "1",
            "idFilmato" => "1"
        ]);

        SerieTv::create([
            "idSerieTv" => "2",
            "idCategoria" => "2",
            "nome" => "Nam nulla metus",
            "descrizione" => "Pretium quis magna id, vehicula consectetur magna. Donec nec nibh non ligula pretium placerat sit amet nec est.",
            "totaleStagioni" => "3",
            "numeroEpisodio" => "2",
            "regista" => "Lorenzo Marino",
            "attori" => "Edoardo Bianchi e Gabriele Romano",
            "annoInizio" => "2011",
            "annoFine" => "2016",
            "idImmagine" => "2",
            "idFilmato" => "2"
        ]);

        SerieTv::create([
            "idSerieTv" => "3",
            "idCategoria" => "3",
            "nome" => "Fusce sapien orci",
            "descrizione" => "Volutpat id quam et, dictum dignissim metus. Cras eu vehicula libero. Suspendisse porttitor augue sagittis dui maximus, et efficitur dui tincidunt.",
            "totaleStagioni" => "4",
            "numeroEpisodio" => "3",
            "regista" => "Matteo di Piero",
            "attori" => "Andrea Ferrari e Mario Rossi",
            "annoInizio" => "2015",
            "annoFine" => "2018",
            "idImmagine" => "3",
            "idFilmato" => "3"
        ]);
    }
}
