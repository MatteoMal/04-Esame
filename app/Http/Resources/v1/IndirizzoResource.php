<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class IndirizzoResource extends JsonResource
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
        "idIndirizzo" => $this->idIndirizzo,
        "idTipologiaIndirizzo" => $this->idTipologiaIndirizzo,
        "comune" => $this->comune,
        "localita" => $this->localita,
        "cap" => $this->cap,
        "indirizzo" => $this->indirizzo,
        "civico" => $this->civico,
        "idNazione" => $this->idNazione
    ];
}
}
