<?php

namespace App\Http\Requests\Fichajes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        if($this->expectsJson()){
            $response = new Response($validator->errors(), 422);
            throw new ValidationException($validator, $response);
        }
    }
    public function rules()
    {
        return [
            'empleado_id' => 'required',
            'entrada' => 'required',
            'salida' => '',
            'ip' => 'required',
            'terminal' => 'required',
            'script' => 'required'
        ];
    }
}
