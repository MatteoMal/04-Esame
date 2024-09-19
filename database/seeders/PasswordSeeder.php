<?php

namespace Database\Seeders;

use App\Models\Password;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Password::create([
            "idPassword" => "1",
            "idContatto" => "1",
            "psw" => "79521051c5c4526354393a974d561458",
            "sale" => "4ee8b3991aa777ebdbfc2b54a9163637"
        ]);
    }
}
