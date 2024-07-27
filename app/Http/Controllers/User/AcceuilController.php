<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Categorie;
use Illuminate\Http\Request;
use App\Models\User\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class AcceuilController extends Controller
{

    // Page d'acceuil
    public function liste_acceuil()
    {
        $panier = session()->get('panier',[]);
     
        $produitAll=DB::table('produits')
        ->leftJoin('categories','categories.id','=','produits.categorie_id')
        ->select('categories.categorie','produits.*')->get();
        $count=$this->count_tab($panier);
        $client= session()->get('client');
        $categorieAll=Categorie::all();
        // session()->flush();
        return view('layout.client_front',compact('categorieAll','client','panier','produitAll','count'));
    }
    public function produit_by_categorie(Request $request){
        $produitAll=DB::table('produits')
        ->join('categories','categories.id','=','produits.categorie_id')
        ->where('categories.id',$request->id)
        ->select('categories.categorie','produits.*')->get();
        $panier = session()->get('panier',[]);

        $count=$this->count_tab($panier);
        $client= session()->get('client');
        $categorieAll=Categorie::all();
        return view('layout.client_front',compact('categorieAll','client','panier','produitAll','count'));

    }
    public function count_tab($array){
        return count($array);
    }


    public function liste_index()
    {
        return view('layout.index');
    }

    public function details_product($id){
        $produit=Produit::find($id);
        $panier = session()->get('panier',[]);
     

        $count=$this->count_tab($panier);
        if(!$produit){
            toastr()->warning("Informations introuvable ou produit inexistant");
            return back();
        }
        if(!$produit->categorie){
            $produitCategorie=DB::table('produits')
            ->leftjoin('categories','categories.id','=','produits.categorie_id')
           ->select('produits.*','categories.categorie')->get();
            return view("layout.details_product",compact('panier','count','produit','produitCategorie'));
        }
        $produitCategorie=DB::table('produits')
        ->join('categories','categories.id','=','produits.categorie_id')
        ->where('categories.categorie',$produit->categorie->categorie)//si la table categories.son atribu(categirie) puis leproduit associe au categorie
       ->select('produits.*','categories.categorie')->get();
        return view("layout.details_product",compact('panier','count','produit','produitCategorie'));
    }

}
