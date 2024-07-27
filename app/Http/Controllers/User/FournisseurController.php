<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Fournisseur;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class FournisseurController extends Controller
{
    //

    public function listes_fournisseur(){
     $fournisseur=Fournisseur::orderBy('id','DESC')->paginate(5);//permet de gerer le forenisseur d'ordre decroissant
        return view("fournisseur.liste",compact('fournisseur'));
    }



    public function ajouter_fournisseur_traitement(Request $request)//store
    {
        // Valider les données de la requête entrante
        $request->validate([
            'nom'=>'required',
            'adresse'=>'nullable',
            'tel'=>'required',
            'email'=>'nullable',
            'profil'=>'nullable|image|mimes:png,jpg,jpeg'
        ]);

        // Si la validation réussit, créer une nouvelle instance d'Etudiant
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $request->nom;
        $fournisseur->adresse = $request->adresse;
        $fournisseur->tel = $request->tel;
        $fournisseur->email = $request->email;
        
        $image = "";

        if($request->hasFile("profil")){
            $image = $request->file('profil')->store('profile','public');
        }
        $fournisseur->profile = $image;

        $fournisseur->save();
         toastr()->success("Fournisseur ajouté avec success ✨😃");
        return back();


        }
   
        public function details_fournisseur ($id){

            $fournisseur = Fournisseur::where('id', $id)->first();

            if (!$fournisseur) {
            return redirect('/fournisseur')->with('error', "fournisseur n'a pas été trouvé");
            }   

            return view('fournisseur.detail', compact('fournisseur'));
         }


        public function update_fournisseur(Request  $request){//traitement 
        $request->validate([
            'nom'=>'required',
            'adresse'=>'nullable',
            'tel'=>'required',
            'email'=>'nullable',
            'profil'=>'nullable|image|mimes:png,jpg,jpeg',
            'id'=>'required'
        ]);


        $fournisseur = Fournisseur::find( $request->id);
        $fournisseur->nom = $request->nom;
        $fournisseur->adresse = $request->adresse;
        $fournisseur->tel = $request->tel;
        $fournisseur->email = $request->email;

        if($request->hasFile("profil")){//ici c'est le profil qui est dans neme de formulaire
            $fournisseur->profile = $request->file('profil')->store('profile','public');
        }
    

        $fournisseur->update();
         toastr()->success("Fournisseur mise a jour avec success ✨😃");
        return back();

    }

    public function recherche(Request $request){
        $searchTerm = $request->search;

        $fournisseur = Fournisseur::where(function($query) use ($searchTerm) {
            $query->where('id', 'LIKE', "%$searchTerm%")
                  ->orWhere('nom', 'LIKE', "%$searchTerm%")
                  ->orWhere('tel', 'LIKE', "%$searchTerm%")
                  ->orWhere('adresse', 'LIKE', "%$searchTerm%")
                  ->orWhere('email', 'LIKE', "%$searchTerm%");
        })->paginate(5);

        return view("fournisseur.liste",compact('fournisseur'));
    }

    public function delete_fournissuer($id){
        if (! Gate::allows('delete_action', Auth::user())) {
            toastr()->error("Droit d'acccès réfusé !");
        }
        $fournisseur=Fournisseur::find($id);
        if(!$fournisseur){
            toastr()->error("Fournisseur introuvable ");
            return back();
        }
        $fournisseur->delete();
        toastr()->success("Fournissuer supprimer avec success !");
        return back();
    }
}
