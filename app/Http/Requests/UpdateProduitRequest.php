<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduitRequest extends FormRequest
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
            'designation'=>'required',//les names
            'prix'=>'required',
            'stock'=>'required',
            'categorie_id'=>'required|exists:categories,id',//ici cest la jointure
            'image'=>'nullable|image|mimes:png,jpg,jpeg|max:2048',//ici cest la jointure

        ];
    }


    public function messages(): array{

        return [
            'designation.required'=>'Le nom du produit est requis',//les names
            'prix.required'=>'Veuillez rentrer le prix',
            'stock.required'=>'Veuillez rentrer le stock',
            'categorie_id.required'=>'Choisr la catégorie',
            'image.image'=>'L image envoyé n est pas conforme',
            'image.mimes'=>'L image doit etre de type jpg,png,ou jpeg',
            'image.max'=>'La taille de l image est suprieure à 2048ko, veuillez revoir',
            'categorie_id.exists'=>'La catégorie n existes plus !',

        ];
    }
}
