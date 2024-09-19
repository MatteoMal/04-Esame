<?php

namespace Database\Seeders;

use App\Models\Episodio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Episodio::create([
            "idEpisodio" => "1",
            "idSerieTv" => "1",
            "titolo" => "Sed elit mi",
            "descrizione" => "Blandit sed massa a, ultricies feugiat felis. In convallis suscipit dui in efficitur. Aenean efficitur gravida nulla, id viverra urna fringilla id.",
            "numeroStagione" => "1",
            "numeroEpisodio" => "1",
            "durata" => "1:00",
            "anno" => "2015",
            "idImmagine" => "1",
            "idFilmato" => "1"
        ]);

        Episodio::create([
            "idEpisodio" => "2",
            "idSerieTv" => "2",
            "titolo" => "Sed tincidunt",
            "descrizione" => "Neque ac purus iaculis condimentum. Aliquam consectetur accumsan mollis. Vivamus lorem mauris, elementum sed risus non, facilisis ultrices justo.",
            "numeroStagione" => "2",
            "numeroEpisodio" => "1",
            "durata" => "1:30",
            "anno" => "2011",
            "idImmagine" => "2",
            "idFilmato" => "2"
        ]);

        Episodio::create([
            "idEpisodio" => "3",
            "idSerieTv" => "3",
            "titolo" => "Cras pellentesque",
            "descrizione" => "Quis sapien a tempor. Ut ultricies, dui eu semper maximus, augue nulla cursus urna, at fringilla mauris dui ac lacus. Donec ultrices enim ac elit malesuada mattis. Integer euismod enim sagittis pretium mollis.",
            "numeroStagione" => "4",
            "numeroEpisodio" => "1",
            "durata" => "1:15",
            "anno" => "2017",
            "idImmagine" => "3",
            "idFilmato" => "3"
        ]);

        Episodio::create([
            "idEpisodio" => "4",
            "idSerieTv" => "1",
            "titolo" => "Nunc eget",
            "descrizione" => "Pellentesque bibendum enim quis imperdiet varius. Morbi bibendum fermentum purus sed faucibus. Morbi ornare lobortis tortor, ut mollis mi.",
            "numeroStagione" => "5",
            "numeroEpisodio" => "2",
            "durata" => "1:00",
            "anno" => "2015",
            "idImmagine" => "4",
            "idFilmato" => "4"
        ]);

        Episodio::create([
            "idEpisodio" => "5",
            "idSerieTv" => "2",
            "titolo" => "Etiam vitae",
            "descrizione" => "Nulla hendrerit, blandit massa sed, ultrices arcu. Praesent scelerisque mi at accumsan bibendum.",
            "numeroStagione" => "3",
            "numeroEpisodio" => "5",
            "durata" => "1:30",
            "anno" => "2016",
            "idImmagine" => "5",
            "idFilmato" => "5"
        ]);

        Episodio::create([
            "idEpisodio" => "6",
            "idSerieTv" => "3",
            "titolo" => "Aenean ligula tortor",
            "descrizione" => "Tincidunt et vestibulum et, fermentum vitae nisi. Maecenas suscipit elit in orci pellentesque, vel ultricies ante volutpat. Fusce euismod quam dictum euismod sollicitudin.",
            "numeroStagione" => "4",
            "numeroEpisodio" => "2",
            "durata" => "1:15",
            "anno" => "2018",
            "idImmagine" => "6",
            "idFilmato" => "6"
        ]);

    }
}
