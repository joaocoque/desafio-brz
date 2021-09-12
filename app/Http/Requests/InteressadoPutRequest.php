<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InteressadoPutRequest extends FormRequest
{

    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required|unique:interessados,email,'. $this->id,
            'imovel_id' => 'nullable'
        ];
    }


    public function messages()
    {
        return [

            'nome.required' => 'Identificação necessária ',
            'email.required' => 'E-mail obrigatório',
            'email.unique' => 'E-mail já utilizado'

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
