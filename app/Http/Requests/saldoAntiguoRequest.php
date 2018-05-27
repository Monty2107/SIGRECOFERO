<?php

namespace SIGRECOFERO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saldoAntiguoRequest extends FormRequest
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
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        return [
            'fechaInicial'=>'required|date|before:now',
            'fechaFinal'=>'required|date|after_or_equal:fechaInicial|before:now',
            'seleccionar'=>'required|array',
        ];
    }
}
