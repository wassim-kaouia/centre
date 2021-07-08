<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

    public function messages(){
        return [
            'email.unique'         => "L'email est deja pris", 
            'first_name.required'  => 'Le prenom est requis',
            'last.required'        => 'Le nom est requis',
            'nationality.required' => 'La Nationalité est requise',
            'age.required'         => "L'age est requis",
            'cin.required'         => 'La CIN est requise',
            'email.required'       => "L'email est requis",
            'address.required'     => "L'adresse est requise",
            'gsm.required'         => 'Le telephone portable est requis',
            'sexe.required'        => 'Il faut preciser votre sexe est requis'
        ];
    }

    public function rules()
    {
        return [
            'first_name'  => 'required|string',
            'last_name'   => 'required|string',
            'nationality' => 'required|string',
            'age'         => 'required|numeric',
            'cin'         => 'required|alpha_num',
            'email'       => 'required|unique:users|email',
            'address'     => 'required|max:255',
            'gsm'         => 'required|numeric',
            'sexe'        => 'required',
        ];
    }
}
