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
        $panier = session()->get('cart',[]);

        $produitAll=Produit::with('categorie')->paginate(10);
        $count=$this->count_tab($panier);
        $client= session()->get('client');

        $categorieAll=Categorie::limit(9)->get();
        // session()->flush();
        return view('clients.index',compact('categorieAll','client','panier','produitAll','count'));
    }
    public function count_tab($array){
        return count($array);
    }



    public function details_product($id){
        $produit=Produit::find($id);
        $panier = session()->get('panier',[]);




        $count=$this->count_tab($panier);
        if(!$produit){
            toastr()->warning("Informations introuvable ou produit inexistant");
            return back();
        }

        $categorieAll=Categorie::all();
        
 
        return view("clients.details-product",compact('panier','count','produit','categorieAll'));
    }



}
