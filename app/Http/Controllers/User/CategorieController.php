<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Categorie;

class CategorieController extends Controller
{
    public function listes_categorie(){
        $categorie=Categorie::orderBy('id','DESC')->paginate(5);//permet de gerer le forenisseur d'ordre decroissant
        return view("categorie.liste",compact('categorie'));
    }


    public function ajouter_Categorie_traitement(Request $request)//store
    {
        // Valider les données de la requête entrante
        $request->validate([
            'categorie'=>'required',
            
        ]);

        // Si la validation réussit, créer une nouvelle instance d'Etudiant
        $categorie = new Categorie();
        $categorie->categorie = $request->categorie;
    
        $categorie->save();
         toastr()->success("categorie a eté bien ajouté avec success ✨😃");
        return back();


    }


    public function details_categorie ($id){

        $cate = Categorie::where('id', $id)->first();
        //ici on prend $cate qui parcour la table au niaveau de la liste
        if (!$cate) {
        return redirect('/categorie')->with('error', "categorie n'a pas été trouvé");
        }   

        return view('categorie.detail', compact('cate'));
     }

     public function update_Categorie(Request $request)//store
    {
        // Valider les données de la requête entrante
        $request->validate([
            'categorie'=>'required',
            'id'=>'required',
            
        ]);

         // Si la validation réussit, créer une nouvelle instance d'Etudiant
         $categorie =Categorie::find($request->id);
         $categorie->categorie = $request->categorie;
     
         $categorie->update();
          toastr()->success("categorie a eté mise a jour avec success ✨😃");
         return back();
 
 
    }

    public function rechercher_categorie(Request $request){
        $searchTerm = $request->search;

        $categorie = Categorie::where(function($query) use ($searchTerm) {
            $query->where('id', 'LIKE', "%$searchTerm%")
                  ->orWhere('categorie', 'LIKE', "%$searchTerm%")
                  ->orWhere('created_at', 'LIKE', "%$searchTerm%")
                  ->orWhere('updated_at', 'LIKE', "%$searchTerm%");
        })->paginate(5);

        return view("categorie.liste",compact('categorie'));
    }
    public function delete_categorie($id){
        $categorie=Categorie::find($id);
        if(!$categorie){
            toastr()->error("Categorie introuvable ");
            return back();
        }
        $categorie->delete();
        toastr()->success("Categorie supprimer avec success !");
        return back();
    }
   
}
