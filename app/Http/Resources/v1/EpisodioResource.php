<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class EpisodioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);
       return $this->getCampi();
    }
    protected function getCampi() 
{
    return [
        "idEpisodio" => $this->idEpisodio,
        "idSerieTv" => $this->idSerieTv,
        "titolo" => $this->titolo,
        "descrizione" => $this->descrizione,
        "numeroStagione" => $this->numeroStagione,
        "numeroEpisodio" => $this->numeroEpisodio,
        "durata" => $this->durata,
        "anno" => $this->anno,
        "idImmagine" => $this->idImmagine,
        "idFilmato" => $this->idFilmato
    ];
}
}
