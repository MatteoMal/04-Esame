<?php

namespace Tests\Unit;

use App\Helpers\AppHelpers;
use PHPUnit\Framework\TestCase;

class AppHelpersTest extends TestCase
{
    /** @test */
    //Array che simula le regole per lo store di un model
    public function aggiornaRegoleHelperTest()
    {
        $arrStore = [
            "campo1" => "required|integer",
            "campo2" => "integer|nullable",
            "campo3" => "string|max:45|nullable",
            "campo4" => "required|string|max:45",
            "campo5" => "integer|min:0|max:2|nullable",
            "campo6" => "array|nullable",
            "campo7" => "required|string|max:20|nullable"
        ];

        /*Array che simula le regole per l'update di un model
        * E' il risultato finale desiderato dall'operazione di trasformazione
        */
        $arrUpdate = [
            "campo1" => "integer",
            "campo2" => "integer|nullable",
            "campo3" => "string|max:45|nullable",
            "campo4" => "string|max:45",
            "campo5" => "integer|min:0|max:2|nullable",
            "campo6" => "array|nullable",
            "campo7" => "string|max:20|nullable"
        ];

        $arrTrasformato = AppHelpers::aggiornaRegoleHelper($arrStore);
        $this->assertEquals($arrUpdate, $arrTrasformato);
        
    }

    /** @test */
    public function isAdminTest(){
        $a = 1;
        $a_controllo = true;

        $a_ricevuto = AppHelpers::isAdmin($a);
        $this->assertEquals($a_controllo, $a_ricevuto);

        $a=rand(2,100);
        $a_controllo = false;
        $a_ricevuto = AppHelpers::isAdmin($a);
        $this->assertEquals($a_controllo, $a_ricevuto);

        $a=rand(2,100);
        $a_controllo = true;
        $a_ricevuto = AppHelpers::isAdmin($a);
        $this->assertNotEquals($a_controllo, $a_ricevuto);


        $a = rand(1,100);
        $a_controllo = ($a == 1) ? true : false;
        $this->assertEquals($a_controllo, $a_ricevuto);
    }
}
