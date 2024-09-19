<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class SerieTvResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return $this->getCampi();
    }
    protected function getCampi() 
{
    return [
        "idSerieTv" => $this->idSerieTv,
        "idCategoria" => $this->idCategoria,
        "nome" => $this->nome,
        "descrizione" => $this->descrizione,
        "totaleStagioni" => $this->totaleStagioni,
        "numeroEpisodio" => $this->numeroEpisodio,
        "regista" => $this->regista,
        "attori" => $this->attori,
        "annoInizio" => $this->annoInizio,
        "annoFine" => $this->annoFine,
        "idImmagine" => $this->idImmagine,
        "idFilmato" => $this->idFilmato
    ];
}
}
