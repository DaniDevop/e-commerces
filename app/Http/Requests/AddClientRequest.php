<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom'=>'required',
            'tel'=>"required|unique:clients,tel",
            'adresse'=>'nullable',
            'password'=>"required|min:4",
            'email'=>"required|email|unique:clients,email",
            'confirmation_password'=>"required|min:4"
        ];
    }


     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function messages(): array
    {
        return [
            'nom.required'=>'Le nom est requis !',
            'tel.required'=>"Le numéro téléphone  est requis",
            'password.required'=>"Le mots de passe est requis ",
            'confirmation_password'=>"Le mots de passe de confirmation est requis",
            'password.min'=>"Le mots de passe doit avoir au-moins 4 caractères ",
            'confirmation_password.min'=>"Le mots de passe doit avoir au-moins 4 caractères ",
            'email.unique'=>"L email existe déjà dans la base de donnée",
            'email.required'=>"L email est requis ",
            'tel.unique'=>"Le numéro de téléphone existes déjà !",

        ];
    }
}
