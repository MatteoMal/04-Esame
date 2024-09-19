<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class IndirizzoStoreRequest extends FormRequest
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
            "idContatto" => "required|integer",
           "idTipologiaIndirizzo" => "required|integer",
           "idNazione" => "required|integer",
           "indirizzo" => "required|string|max:255",
           "civico" => "string|max:255",
           "cap"  =>"string|max:255",
           "localita" => "string|max:255",
           "comune" => "required|string|max:255"
        ];
    }
}
