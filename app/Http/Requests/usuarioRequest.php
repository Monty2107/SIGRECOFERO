<?php

namespace SIGRECOFERO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuarioRequest extends FormRequest
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
            'nombre'=>'require|min:3|max:120',
            'correo'=>'require',
            'password'=>'require|min:5',
            'cargo'=>'required',

        ];
    }
}
