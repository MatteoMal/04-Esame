<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class EpisodioStoreRequest extends FormRequest
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
            "idEpisodio" => "required|integer",
           "idSerieTv" => "required|integer",
           "titolo" => "required|string|max:255",
           "descrizione" => "required|string|max:500",
           "numeroStagione" => "required|integer",
           "numeroEpisodio"  =>"required|integer",
           "durata" => "required|string|max:50",
           "anno" => "required|string|max:50",
           "idImmagine" => "required|integer",
           "idFilmato" => "required|integer"
        ];
    }
}
