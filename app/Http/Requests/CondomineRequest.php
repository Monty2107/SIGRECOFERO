<?php

namespace SIGRECOFERO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CondomineRequest extends FormRequest
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
            'nombre'=> 'required|string|min:4|max:120',
            'correo'=> 'required|min:4|max:120',
            'codigo'=>'required|min:3',
            'opciones'=>'required|min:1|array',
            'NLocal'=>'required',
            'facturacion'=>'required'
        ];
    }
}
