<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return $this->getCampi();
    }
    protected function getCampi() 
{
    return [
        "idAuth" => $this->idAuth,
        "idContatto" => $this->idContatto,
        "user" => $this->user,
        "sfida" => $this->sfida,
        "secretJWT" => $this->secretJWT,
        "inizioSfida" => $this->inizioSfida,
        "obbligoCampo" => $this->obbligoCampo
    ];
}
}
