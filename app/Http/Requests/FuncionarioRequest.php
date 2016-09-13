<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FuncionarioRequest extends Request
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required',
            'login' => 'required|unique:usuario',
            'cargo' => 'required',
        ];
    }
}
