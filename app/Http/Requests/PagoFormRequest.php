<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoFormRequest extends FormRequest
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
            'documento' => 'required|min:3',
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'empresa' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'monto' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'provincia' => 'required',
            'pais' => 'required',
            'telefono' => 'required',
            'movil' => 'required'



        ];
    }
}
