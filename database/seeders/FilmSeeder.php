<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Film::create([
            "idFilm" => 1,
            "idCategoria" => 1,
            "titolo" => "Lorem Ipsum",
            "descrizione" => "Sit amet, consectetur adipiscing elit. Mauris tristique hendrerit auctor. Nam consectetur augue at felis eleifend, in ultrices ante interdum. Nam quis velit quam. Maecenas eu tortor nec felis porttitor rhoncus. Vivamus at sapien id felis tempus auctor. Nunc ut ex nibh. Nunc mattis nulla in viverra pellentesque.",
            "durata" => "2:10",
            "regista" => "Mario Rossi",
            "attori" => "Pippo Franco e Roberto Ferrari",
            "anno" => "2012",
            "idImmagine" => 1,
            "idFilmato" => 1,
            "categoria" => "Commedia"
        ]);

        Film::create([
            "idFilm" => 2,
            "idCategoria" => 2,
            "titolo" => "Vestibulum eleifend",
            "descrizione" => "Cursus lectus, ut euismod erat consequat id. Mauris placerat diam sit amet enim hendrerit, ut placerat orci commodo. Proin vitae egestas ligula. Duis ut gravida sapien, eu hendrerit mauris.",
            "durata" => "1:40",
            "regista" => "Flavio Bianchi",
            "attori" => "Luigi Rossi e Marco Simeoni",
            "anno" => "2015",
            "idImmagine" => 2,
            "idFilmato" => 2,
            "categoria" => "Dramma"
        ]);
        Film::create([
            "idFilm" => 3,
            "idCategoria" => 3,
            "titolo" => "Sed ut",
            "descrizione" => "Ipsum vel ligula faucibus commodo. In sed ex vel ex pretium pretium in sit amet velit. Vestibulum ut pharetra sem. Nam eros mauris, tempor et tortor eget, volutpat sagittis odio.",
            "durata" => "1:40",
            "regista" => "Flavio Bianchi",
            "attori" => "Lucilla Casali e Matteo di Benedetto",
            "anno" => "2013",
            "idImmagine" => 3,
            "idFilmato" => 3,
            "categoria" => "Horror"
        ]);

        Film::create([
            "idFilm" => 4,
            "idCategoria" => 4,
            "titolo" => "Maecenas non",
            "descrizione" => "Purus venenatis, blandit nisi quis, eleifend lectus. Duis egestas luctus interdum. Suspendisse potenti. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus.",
            "durata" => "1:30",
            "regista" => "Sabrina Trombetta",
            "attori" => "Simone Esposito e Raffaele Romano",
            "anno" => "2017",
            "idImmagine" => 4,
            "idFilmato" => 4,
            "categoria" => "Musical"
        ]);

        Film::create([
            "idFilm" => 5,
            "idCategoria" => 5,
            "titolo" => "Mauris ullamcorper",
            "descrizione" => "Semper arcu, sed cursus nisi viverra ut. Fusce id odio id turpis iaculis finibus. Nulla consectetur tristique viverra. Praesent et tellus aliquam, ullamcorper tortor id, venenatis felis.",
            "durata" => "1:20",
            "regista" => "Mario Bruno",
            "attori" => "Flavia Ricci e Francesco Marino",
            "anno" => "2011",
            "idImmagine" => 5,
            "idFilmato" => 5,
            "categoria" => "Romantico"
        ]);
        
    }
}
