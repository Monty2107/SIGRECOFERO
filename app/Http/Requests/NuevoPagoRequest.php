<?php

namespace SIGRECOFERO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NuevoPagoRequest extends FormRequest
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
            'descripcion'=> 'required|min:5|max:120',
            'fechaInicial'=>'required|date|before:mañana',
            'fechaFinal'=>'required|date|after_or_equal:fechaInicial',
            'cantidad'=>'required'
        ];
    }
}
