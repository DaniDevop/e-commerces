<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'designation'=>'required',
            'prix'=>'required',
            'stock'=>'required',
            'categorie_id'=>'required|exists:categories,id',//ici cest la jointure
            'code'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2048',//ici cest la jointure
        ];
    }

    public function messages():array
    {
        return [
            'designation.required'=>'Le nom du produit est requis',
            'prix.required'=>'Le prix du produit est requis',
            'stock.required'=>'Le stock du produit est requis',
            'categorie_id.required'=>'Choisir une catégorie pour le produit.',//ici cest la jointure
            'image.required'=>'Il faut une image pour le produit',
            'categorie_id.exists'=>'La catégorie n existe plus',//ici cest la jointure
            'image.image'=>'L image n est pas de bon type',//ici cest la jointure
            'image.mimes'=>'L image  doit etre de type Png,jpg,jpeg',//ici cest la jointure
            'image.max'=>'L image est trop grande veuillez revoir la taille !',//ici cest la jointure
        ];

    }
}
