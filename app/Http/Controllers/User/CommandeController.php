<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\detail_commande;
use App\Models\User\Facture;
use Illuminate\Http\Request;
use App\Models\User\Commande;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function liste_commande(){

        $commandes=DB::table('commandes')
        ->join('clients','commandes.client_id','=','clients.id')
        ->select('commandes.*','clients.nom')
        ->orderByDesc('id')
        ->paginate(5);
        return view("commande.liste",compact('commandes'));
    }


    public function detail_commande($id){
        $commandes=Commande::find($id);
        if(!$commandes){
            toastr()->error("Informations indisponible !");
            return back();
        }

        $detail_commandes=detail_commande::where('commande_id',$commandes->id)->get();
        $detail_commandes=DB::table('detail_commandes')
        ->join('produits','produits.id','=','detail_commandes.produit_id')
        ->join('commandes','commandes.id','=','detail_commandes.commande_id')
        ->select('produits.designation','detail_commandes.*')->paginate(5);
        return view("commande.detail",compact('detail_commandes'));
    }

    public function valider_commande($id){
        $commandes=Commande::find($id);
        if(!$commandes){
            toastr()->error("Informations indisponible !");
            return back();
        }
       
        $commandes->status="Valider";
        $commandes->update();
        $factures=new Facture();
        $factures->date=date('Y-m-d');
        $factures->commande_id=$commandes->id;
        $factures->montant=$this->somme_factures($commandes->id);
        $factures->save();
        toastr()->success("Commandes valider avec success !");
        return back();
    }


    public function somme_factures($id){
        $result = DB::select("
        SELECT SUM(produits.prix * detail_commandes.qte_commande) AS sommePayer
        FROM detail_commandes
        JOIN commandes ON detail_commandes.commande_id = commandes.id
        JOIN produits ON produits.id = detail_commandes.produit_id
        WHERE commandes.id = ?", [$id]);
        $somme_paye=0;
        foreach($result as $resultat){
            $somme_paye=$resultat->sommePayer;
        }
       return $somme_paye;
    }


    public function rechercher_commandes(Request $request){
        $searchTerm = $request->search;

        $commandes = DB::table('commandes')
        ->join('clients', 'commandes.client_id', '=', 'clients.id')
        ->where(function($query) use ($searchTerm) {
            $query->where('commandes.id', 'LIKE', "%$searchTerm%")
                ->orWhere('commandes.date', 'LIKE', "%$searchTerm%")
                ->orWhere('commandes.status', 'LIKE', "%$searchTerm%")
                ->orWhere('clients.nom', 'LIKE', "%$searchTerm%");
        })
        ->select('commandes.*','clients.nom')
        ->paginate(5);
        return view("commande.liste",compact('commandes'));
 

    }
}
