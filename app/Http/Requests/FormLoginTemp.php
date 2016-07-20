<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Route;

class FormLoginTemp extends Request
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
        if($this->route()->uri() === 'registrar_pwd/almacenar')
            $pass = 'required|min:6';
        else $pass = 'min:6';
        return [
            'usuario' => 'required|alpha_num',
            'password' => $pass,
            'rpassword' => $pass,
        ];
    }

    public function messages(){
        return [
            'password.required' => 'El campo contraseña el obligatorio',
            'rpassword.required' => 'El campo repita su contraseña el obligatorio',
            
        ];
    }
}
