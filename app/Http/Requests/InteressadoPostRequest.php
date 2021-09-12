<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class InteressadoPostRequest extends FormRequest
{

    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required|unique:interessados,email',
            'imovel_id' => 'required'
        ];
    }


    public function messages()
    {
        return [

            'nome.required' => 'Identificação necessária ',
            'email.required' => 'E-mail obrigatório',
            'email.unique' => 'E-mail já utilizado',
            'imovel_id.required'=> 'Imovel obrigatório'

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
