<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\detail_commande;
use Illuminate\Http\Request;
use App\Models\User\Facture;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    //

    public function listes_facture(){
        $facture=Facture::orderBy('id','DESC')->paginate(10);//permet de gerer le forenisseur d'ordre decroissant
    
        return view("facture.liste",compact('facture')); 
    }

    public function imprime_factures($id){
        
        
        $factures = Facture::where('commande_id',$id)->first();
        $ventesAll = detail_commande::where('commande_id', $factures->commande_id)->get();

$ventesAll=DB::table('detail_commandes')
->join('commandes','commandes.id','=','detail_commandes.commande_id')
->join('produits','produits.id','=','detail_commandes.produit_id')
->where('commandes.id',$factures->commande_id)
  ->select('produits.designation','produits.prix','detail_commandes.*')
  ->get()
;


    
    
        
        // $pdf = PDF::loadView('facture.factures', compact('factures', 'ventesAll'));
        // return $pdf->stream();
        return view("facture.factures", compact('factures', 'ventesAll'));

    }
}
