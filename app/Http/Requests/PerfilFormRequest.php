<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'tipo'=>['required','min:4','max:30'],
            'conteudo'=>['required','min:10'],
        ];
    }
    public function messages(){
        return[
            'required'=>"Campo Necessário",
            'min'=>"Necessário pelomenos :min caracteres"
        ];
    }
}
