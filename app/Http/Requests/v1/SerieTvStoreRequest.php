<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class SerieTvStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "idSerieTv" => "required|integer",
           "idCategoria" => "required|integer",
           "nome" => "required|string|max:255",
           "descrizione" => "required|string|max:500",
           "totaleStagioni" => "required|integer",
           "numeroEpisodio"  =>"required|integer",
           "regista" => "required|string|max:45",
           "attori" => "required|string|max:45",
           "annoInizio" => "required|string|max:50",
           "annoFine" => "required|string|max:50",
           "idImmagine" => "required|integer",
           "idFilmato" => "required|integer"
        ];
    }
}
