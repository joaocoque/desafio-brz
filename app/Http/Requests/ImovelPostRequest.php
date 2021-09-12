<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ImovelPostRequest extends FormRequest
{

    public function rules()
    {
        return [
            'codigo' => 'required|unique:imoveis,codigo',
            'tipo' => 'required',
            'pretensao' => 'required',
            'titulo' => 'required',
            'detalhes' => 'required',
            'quartos' => 'required',
            'valor' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'codigo.required' => 'Código obrigatório',
            'codigo.unique' => 'Código deve ser unico',
            'tipo.required' => 'Tipo é obrigatório',
            'pretensao.required' => 'Pretenção obrigatória',
            'titulo.required' => 'titulo é obrigatório',
            'detalhes.required' => 'Detalhe deve ser obrigatório',
            'quartos.required' => 'número de quartos obrigatório',
            'valor.required' => 'deve-se indicar valor de interesse',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
