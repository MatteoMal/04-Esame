<?php

namespace Database\Seeders;

use App\Models\Credito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credito::create([
            "idCredito" => "3",
            "idContatto" => "1",
            "credito" => "0"
        ]);
    }
}
