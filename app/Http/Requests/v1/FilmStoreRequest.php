<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class FilmStoreRequest extends FormRequest
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
            "idFilm" => "required|integer",
           "idCategoria" => "required|integer",
           "titolo" => "required|string|max:255",
           "descrizione" => "required|string|max:500",
           "durata" => "required|string|max:50",
           "regista"  =>"required|string|max:45",
           "attori" => "required|string|max:45",
           "anno" => "required|string|max:50",
           "idImmagine" => "required|integer",
           "idFilmato" => "required|integer",
           "categoria" => "required|string|max:255"
        ];
    }
}
