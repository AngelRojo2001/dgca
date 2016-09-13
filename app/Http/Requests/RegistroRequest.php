<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistroRequest extends Request
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
            'codigo_rai' => 'required|min:10|max:10',
            'nombre_ui' => 'required',
            'razon_social' => 'required',
            'direccion_ui' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required',
            'fecha_registro' => 'required',
        ];
    }
}
