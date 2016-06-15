<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Route;

class FormCrearUsuario extends Request
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
        if($this->route()->uri() === 'usuario/almacenar')
            $pass = 'required|min:6';
        else $pass = 'min:6';
        return [
            'nom_u' => 'required|alpha',
            'ape_pat_u' => 'required|alpha',
            'ape_mat_u' => 'required|alpha',
            'ci_u'=>'required|digits_between:5,8',
            'email_u' => 'required|email',
            'direccion_u' => 'required|String',
            'telefono_u' => 'required|digits_between:7,8',
            'celular_u' => 'required|digits:8',
            'usuario' => 'required|alpha_num',
            'password' => $pass,
            'rpassword' => $pass,
            'curriculum'=>'mimes:doc,docx,pdf',
            'tipo' => 'required',
        ];
    }

    public function messages(){
        return [
            'ape_pat.required' => 'El campo apellido paterno es obligatorio',
            'ape_pat.alpha' => 'El campo apellido paterno solo puede contener letras',
            'ape_mat.required' => 'El campo apellido materno es obligatorio',
            'ape_mat.alpha' => 'El campo apellido materno solo puede contener letras',
            'password.required' => 'El campo contraseña el obligatorio',
            'rpassword.required' => 'El campo repita su contraseña el obligatorio',
            'curriculum'=>'El archivo tiene que ser de extensión doc,docx,pdf',
        ];
    }
}
