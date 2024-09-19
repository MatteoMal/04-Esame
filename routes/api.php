<?php

use App\Helpers\AppHelpers;
use App\Http\Controllers\Api\v1\AccediController;
use App\Http\Controllers\Api\v1\CategoriaController;
use App\Http\Controllers\Api\v1\ComuneItalianoController;
use App\Http\Controllers\Api\v1\ConfigurazioneController;
use App\Http\Controllers\Api\v1\ContattoController;
use App\Http\Controllers\Api\v1\CreditoController;
use App\Http\Controllers\Api\v1\EpisodioController;
use App\Http\Controllers\Api\v1\FilmController;
use App\Http\Controllers\Api\v1\GruppoController;
use App\Http\Controllers\Api\v1\NazioneController;
use App\Http\Controllers\Api\v1\TipologiaIndirizzoController;
use App\Http\Controllers\Api\v1\IndirizzoController;
use App\Http\Controllers\Api\v1\RecapitoController;
use App\Http\Controllers\Api\v1\SerieTvController;
use App\Http\Controllers\Api\v1\StatoController;
use App\Http\Controllers\Api\v1\TipologiaRecapitoController;
use App\Http\Resources\v1\SerieTvResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

if (!defined("_VERS")) {
    define("_VERS", "v1");
}
//API aperte

Route::get(_VERS . "/cifra/{utente}", [AccediController::class, "cifra"]);
Route::get(_VERS . '/testLogin', function () {
    $hashUser = "08bcc090fe04be7da0049123353d48c4a6108467659ecb7e52e3facfb123dd80858c2268c5e229a0c5b3b898abd7aeabd88b389ce3a4025665606d3afae50d4e";
    $pwd = "51aca46c053f92af6ec67537d0550a3d76ce173be049c9517d402a0a02443ba509289bc150cbfde1b74310fc44753313ab3d2f25dab9ff0bbd3f53265bf961f5";
    $salt = "a0c299b71a9e59d5ebb07917e70601a3570aa103e99a7bb65a58e780ec9077b1902d1dedb31b1457beda595fe4d71d779b6ca9cad476266cc07590e31d84b206";

    $hashSalePsw = AppHelpers::nascondiPassword($pwd, $salt);

    AccediController::testLogin($hashUser, $hashSalePsw);
});


Route::get(_VERS . "/accedi/{utente}/{hash?}", [AccediController::class, "show"]);
Route::get(_VERS . "/searchMail/{utente}", [AccediController::class, "searchMail"]);
Route::post(_VERS . "/registrazione/", [ContattoController::class, "registra"]);


Route::get(_VERS . "/nazioni", [NazioneController::class, "index"]);
Route::get(_VERS . "/nazioni/{nazione}", [NazioneController::class, "show"]);

Route::get(_VERS . "/configurazioni", [ConfigurazioneController::class, "index"]);
Route::get(_VERS . "/configurazioni/{configurazione}", [ConfigurazioneController::class, "show"]);

Route::get(_VERS . "/tipologiaRecapiti", [TipologiaRecapitoController::class, "index"]);
Route::get(_VERS . "/tipologiaRecapiti/{tipologiaRecapito}", [TipologiaRecapitoController::class, "show"]);


Route::get(_VERS . "/tipologiaIndirizzi", [TipologiaIndirizzoController::class, "index"]);
Route::get(_VERS . "/tipologiaIndirizzi/{tipologiaIndirizzo}", [TipologiaIndirizzoController::class, "show"]);


Route::get(_VERS . "/comuniItaliani", [ComuneItalianoController::class, "index"]);
Route::get(_VERS . "/comuniItaliani/{comuneItaliano}", [ComuneItalianoController::class, "show"]);

Route::get(_VERS . "/stati", [StatoController::class, "index"]);
Route::get(_VERS . "/stati/{stato}", [StatoController::class, "show"]);

Route::get(_VERS . "/gruppi", [GruppoController::class, "index"]);
Route::get(_VERS . "/gruppi/{gruppo}", [GruppoController::class, "show"]);


//API con autenticazione UTENTE
Route::middleware(['autenticazione', 'contattoRuolo:Amministratore,Utente'])->group(function (){

    //CATEGORIE
    Route::get(_VERS . "/categorie", [CategoriaController::class, "index"]);
    Route::get(_VERS . "/categorie/{categoria}", [CategoriaController::class, "show"]);

    //CONTATTI
    Route::get(_VERS . "/contatti/{contatto}", [ContattoController::class, "show"]);
    Route::put(_VERS . "/contatti/{contatto}", [ContattoController::class, "update"]);
    Route::post(_VERS . "/contatti", [ContattoController::class, "store"]);
    Route::delete(_VERS . "/contatti/{contatto}", [ContattoController::class, "destroy"]);

    //CONTATTORECAPITI
    Route::get(_VERS . "/recapiti", [RecapitoController::class, "index"]);

    //CONTATTOINDIRIZZI
    Route::get(_VERS . "/indirizzi", [IndirizzoController::class, "index"]);

    //CREDITI
    Route::put(_VERS . "/crediti/{contatto}/credito/{credito}", [CreditoController::class, "updateCredito"]);

    //FILM
    Route::get(_VERS . "/films", [FilmController::class, "index"]);
    Route::get(_VERS . "/films/categoria/{categoria}", [FilmController::class, "indexCategoria"]);
    Route::get(_VERS . "/films/{film}", [FilmController::class, "show"]);

    //SERIETV
    Route::get(_VERS . "/serieTV", [SerieTvController::class, "index"]);
    Route::get(_VERS . "/serieTV/categoria/{categoria}", [SerieTvController::class, "indexCategoria"]);
    Route::get(_VERS . "/serieTV/{serieTV}", [SerieTvController::class, "show"]);

    //EPISODI
    Route::get(_VERS . "/episodi", [EpisodioController::class, "index"]);
    Route::get(_VERS . "/episodi/{episodio}", [EpisodioController::class, "show"]);

});

//API con autenticazione ADMIN
Route::middleware(['autenticazione', 'contattoRuolo:Amministratore'])->group(function (){

    //CATEGORIE
    Route::put(_VERS . "/categorie/{categoria}", [CategoriaController::class, "update"]);
    Route::post(_VERS . "/categorie", [CategoriaController::class, "store"]);
    Route::delete(_VERS . "/categorie/{categoria}", [CategoriaController::class, "destroy"]);

    //CONTATTI
    Route::get(_VERS . "/contatti", [ContattoController::class, "index"]);

    //FILM
    Route::put(_VERS . "/films/{film}", [FilmController::class, "update"]);
    Route::post(_VERS . "/films", [FilmController::class, "store"]);
    Route::delete(_VERS . "/films/{film}", [FilmController::class, "destroy"]);

    //SERIETV
    Route::put(_VERS . "/serieTV/{serieTV}", [SerieTvController::class, "update"]);
    Route::post(_VERS . "/serieTV", [SerieTvController::class, "store"]);
    Route::delete(_VERS . "/serieTV/{serieTV}", [SerieTvController::class, "destroy"]);

    //EPISODI
    Route::get(_VERS . "/episodi", [EpisodioController::class, "index"]);
    Route::post(_VERS . "/episodi", [EpisodioController::class, "store"]);
    Route::put(_VERS . "/episodi/{episodio}", [EpisodioController::class, "update"]);
    Route::delete(_VERS . "/episodi/{episodio}", [EpisodioController::class, "destroy"]);



});
