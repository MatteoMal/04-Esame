<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            "idCategoria" => "1",
            "nome" => "Commedia"
        ]);
        Categoria::create([
            "idCategoria" => "2",
            "nome" => "Dramma"
        ]);
        Categoria::create([
            "idCategoria" => "3",
            "nome" => "Horror"
        ]);
        Categoria::create([
            "idCategoria" => "4",
            "nome" => "Musical"
        ]);
        Categoria::create([
            "idCategoria" => "5",
            "nome" => "Romantico"
        ]);
    }
}
