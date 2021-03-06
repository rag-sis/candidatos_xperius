<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Route;

class FormEditarUsuario extends Request
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
            'nom_u' => 'required|String',
            //'email_u' => 'required|email|unique:usuarios,email_u,NULL,id,cod_u,'.$this->id,    . $this->get('id');
            'email_u' => 'required|email|unique:usuarios,email_u,'.$this->id.',cod_u',
            'direccion_u' => 'String',
            'telefono_u' => 'digits_between:7,8',
            'celular_u' => 'digits:8',
            //'usuario' => 'required|alpha_num|unique:usuarios,usuario,NULL,id,cod_u,'.$this->id,
            'usuario' => 'required|alpha_num|unique:usuarios,usuario,'.$this->id.',cod_u',
            'password' => $pass,
            'rpassword' => $pass,
            'curriculum'=>'mimes:doc,docx,pdf',
            'url_curriculum'=>'url',
            'tipo' => 'required',
        ];

    }

    public function messages(){
        return [
            'password.required' => 'El campo contraseña el obligatorio',
            'rpassword.required' => 'El campo repita su contraseña el obligatorio',
            'curriculum'=>'El archivo tiene que ser de extensión doc,docx,pdf',
        ];
    }
}
