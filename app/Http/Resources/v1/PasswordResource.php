<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class PasswordResource extends JsonResource
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
        "idPassword" => $this->idPassword,
        "idContatto" => $this->idContatto,
        "psw" => md5($this->psw),
        "sale" => $this->sale
    ];
}

}