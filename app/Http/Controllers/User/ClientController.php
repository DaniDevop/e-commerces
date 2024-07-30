<?php

namespace App\Http\Controllers\User;

use App\Models\detail_commande;
use App\Models\User\Client;
use App\Models\User\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddClientRequest;
use App\Models\User\Categorie;
use App\Models\User\Commande;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ClientController extends Controller
{


    public function __construct(){

    }
    public function listes_client(){
        $clients=DB::table("clients")
        ->orderByDesc('id')
        ->paginate(5);//permet de gerer le forenisseur d'ordre decroissant
        return view("client.liste",compact('clients'));
     }

     public function dashbord_client(){
        $clientId= session()->get('client');

        $clientExist= Client::find( $clientId);
        if(!$clientExist){
            toastr()->error("Veuillez vous connecter !!!");
            return redirect()->route("listes.acceuil");
        }
        $commande=DB::table('detail_commandes')
    ->leftJoin('commandes','commandes.id','=','detail_commandes.commande_id')
    ->leftJoin('produits','produits.id','=','detail_commandes.produit_id')
    ->where('commandes.client_id',$clientExist->id)
    ->orderBydesc('commandes.date')
    ->select('commandes.date','commandes.status as stat','produits.designation','produits.prix','produits.photo_first','detail_commandes.*')->paginate(5);

        return view("layout.dashboard",compact('commande','clientExist'));
     }


      public function ajouter_client_traitement(Request $request)//store
     {
        $request->validate([
            'nom'=>'required',
            'adresse'=>'nullable',
            'tel'=>'required',
            'email'=>'nullable',
        ]);
       $client = new Client();
       $client->nom = $request->nom;
       $client->adresse = $request->adresse;
       $client->tel = $request->tel;
       $client->email = $request->email;


       $client->save();
         toastr()->success("client ajouté avec success ✨😃");
        return back();

     }

     public function update_client(Request  $request){//traitement
        $request->validate([
            'nom'=>'required',
            'adresse'=>'nullable',
            'tel'=>'required',
            'email'=>'nullable',
            'id'=>'required'
        ]);


       $client = Client::find( $request->id);
       $client->nom = $request->nom;
       $client->adresse = $request->adresse;
       $client->tel = $request->tel;
       $client->email = $request->email;


       $client->update();
         toastr()->success("client mise a jour avec success ✨😃");
        return back();

     }

        public function details_client ($id){

        $client = Client::where('id', $id)->first();

        if (!$client) {
        return redirect('/client')->with('error', "client n'a pas été trouvé");
        }

        return view('client.detail', compact('client'));
     }




        public function login_client(Request $request){//ici validate c'est pour verifier si les information existe dans la requete pour les envoyer dans la base
            $request->validate([
                'emailOrTel'=>'required',
                'password'=>'required',
            ],[
                'emailOrTel.required'=>'L identifiant est requis !',
                'password.required'=>'Le mot de passe est requis',
            ]);




        $clientExist=Client::where('email',$request->emailOrTel)->first();//cette ligne de code effectuer une recherche dans la base de données.

        if(!$clientExist){//ici cest pour dire si le client n'existe pas dans la base on lui dit de creer un compte

            toastr()->error("Informations introuvable ou veuillez creer un compte");
            return back();
        }
         if(!Hash::check($request->password,$clientExist->password)){//ici ce pour verifier si le mdp fourni corespond au mdp qui est dans la basse
            toastr()->error("Informations introuvable ou veuillez creer un compte");
            return back();
         }
         session(['client' => $clientExist->id]);
         toastr()->info("Bienvenue a vous  ",$clientExist->nom);

        return redirect()->route('listes.acceuil');

        }

        public function  register_client(){

            return view("layout.register");
        }


        public function create_client(AddClientRequest $request){//ajout client

        if($request->password !=$request->confirmation_password){
            toastr()->warning("Les Mots de passes ne sont pas identiques !!");
            return back();
        }


        $client=new Client();
        $client->nom=$request->nom;
        $client->tel=$request->tel;
        $client->adresse=$request->adresse;
        $client->email=$request->email ;
        $client->password=Hash::make($request->password);
        $client->save();
        toastr()->info("Compte creer avec succes 👍✔!!");
        return redirect()->back();




    }

    public function addCart(Request $request){

        $id=$request->input('id');
        $produit = Produit::findOrFail($id);

        $cart = session()->get('cart', []);


        if(isset($cart[$id])) {
            if($cart[$id]['qte_commande'] > $produit->stock ){

                return redirect()->back()->with('warning', 'La quantité demandé n est pas disponible');
            }
            $cart[$id]['qte_commande']++;
        } else {
            $cart[$id] = [
              'produit_id'=>$produit->id,
            'designation'=>$produit->designation,
            'prix'=>$produit->prix,
            'qte_commande'=>1,
            'profile'=>$produit->photo_first
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product ajouté avec success !!');

    }

    public function add_product_panier(Request $request)
    {
        // Recherche du produit par son ID
        $produit = Produit::find($request->id);

        // Vérification si le produit existe
        if (!$produit) {
            return response()->json(['error' => 'Le produit n\'existe pas'], 404);
        }
        $panier=session()->get('panier',[]);
        $produitExist=true;
         foreach($panier as $prod){
            if($prod['produit_id']==$produit->id){
                $produitExist=false;
                 break;
            }
         }
         if(!$produitExist){
            return response()->json(['error' => 'Le produit est déjà dans le panier'], 404);

         }




        $panier[]=[
            'produit_id'=>$produit->id,
            'designation'=>$produit->designation,
            'prix'=>$produit->prix,
            'qte_commande'=>1,
            'profile'=>$produit->photo_first

        ];
        session()->put('panier',$panier);
        $count=$this->count_tab($panier);
         return response()->json(['count' => $count]);


    }

    public function showPanier(){

       $cart=session()->get('cart',[]);

       $sommeTotal=0;
       foreach($cart as $prod){
        $sommeTotal=$sommeTotal+($prod['prix']*$prod['qte_commande']);
       }
       $client= session()->get('client');




         return view("clients.cart",compact('client','cart','sommeTotal'));
    }

    // Deconnection client

    public function logout(){
        $client = session()->get('client');

      session()->forget('client');
      return redirect()->route('listes.acceuil');
    }


    public function login(){

        return view('clients.login');
    }

    public function register(){
        return view('clients.register');

    }

    public function count_tab($array){
        return count($array);
    }

    public function update_panier(Request $request)
{

    $produitVerification=Produit::find($request->id);
    if($produitVerification->stock<$request->qte_commande){
        toastr()->warning("Désolé nous avons plus cette quantité en stock !");
        return back();
    }
    $panier = session()->get('panier', []);

    $productId = $request->id;

    $newQuantity = $request->qte_commande;

    // Utilisation de array_map pour mettre à jour le produit spécifique
    $panier = array_map(function ($item) use ($productId, $newQuantity) {
        if ($item['produit_id'] == $productId) {
            $item['qte_commande'] = $newQuantity;
        }
        return $item;
    }, $panier);

    session()->put('panier', $panier);
    toastr()->success("Quantité modifiée avec succès !");
    return back();
}
public function valide_commande_login( Request $request){

           $id =$request->input('id');
           $clientExist=Client::where('id',$id)->first();//cette ligne de code effectuer une recherche dans la base de données.

           if(!$clientExist){//ici cest pour dire si le client n'existe pas dans la base on lui dit de creer un compt
               toastr()->error("Informations introuvable ou veuillez creer un compte");
               return back();
           }

            $panier=session()->get('cart',[]);
            $caracteres_aleatoires = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

            $facture = 'INV' . substr(str_shuffle($caracteres_aleatoires), 0, 7);

            $commandes=new Commande();
            $commandes->matricule=$facture.$clientExist->id;
            $commandes->date=date('Y-m-d');
            $commandes->status="En-cours";
            $commandes->client_id=$clientExist->id;
            $commandes->save();
            foreach($panier as $prod){
               $produit = Produit::findOrFail($prod['produit_id']);
               $ventes=new detail_commande();
               $ventes->produit_id=$prod['produit_id'];
               $ventes->commande_id=$commandes->id;
               $ventes->qte_commande=$prod['qte_commande'];
               $ventes->save();
               $produit->update(['stock' => $produit->stock - $prod['qte_commande']]);
            }
            session()->forget('cart');
            toastr()->info("Vos commandes sont valider avec success");
           return back();
       }



    public function rechercher_client(Request $request){
        $searchTerm = $request->search;

        $clients = Client::where(function($query) use ($searchTerm) {
            $query->where('id', 'LIKE', "%$searchTerm%")
                  ->orWhere('nom', 'LIKE', "%$searchTerm%")
                  ->orWhere('tel', 'LIKE', "%$searchTerm%")
                  ->orWhere('adresse', 'LIKE', "%$searchTerm%")
                  ->orWhere('email', 'LIKE', "%$searchTerm%");
        })->paginate(5);

        return view("client.liste",compact('clients'));
    }

    // Mise à jour du client
 public function client_update_informations(Request $request){
    $client=Client::find($request->id);
    $client->nom=$request->nom;
    $client->email=$request->email;
    $client->adresse=$request->adresse?:'';
    $client->tel=$request->tel;
    $client->update();
    toastr()->info("Vos données sont modifié avec success !");
    return redirect()->route('client.dahsbord.panier');

 }
//  Mise à jour de mot de passe client
 public function update_password_clients(Request $request){
    $client=Client::find($request->id);
    if($request->new_passe != $request->confirmation_password){
        toastr()->warning("Vos mots de passes sont differents");
        return back();
    }
    if(!Hash::check($request->password,$client->password)){
        toastr()->warning("Mots de passes incorect");
        return back();
    }
    $client->password=Hash::make($request->new_passe);
    $client->update();
    toastr()->success("Votre Mots de passe modifier avec success !");
    return back();
 }


//  Annulation de la commande
 public function annulation_commande($id){
    $details_commande=detail_commande::find($id);
    if(!$details_commande){
        toastr()->error("Produit introuvable !");
        return back();
    }

    $details_commande->delete();
    toastr()->info("Produit supprimer avec success !");
    return back();

 }


 public function remove(Request $request)
 {
     if($request->id) {
         $cart = session()->get('cart');
         if(isset($cart[$request->id])) {
             unset($cart[$request->id]);
             session()->put('cart', $cart);
         }
         session()->flash('success', 'Produit supprimé avec succès !');
         return back();
     }
 }


 public function findProductByCategorie($id){

    $categorie=Categorie::find($id);
    if(!$categorie){
        flash()->error("Veuillez rafraichir la page catégorie inexsitant");
        return back();
    }

        $categorieAll=Categorie::all();
        $produitAll=Produit::where('categorie_id',$categorie->id)->paginate(10);
        return view('clients.product',[
          'categorieAll'=>$categorieAll,
          'produitAll'=>$produitAll

        ]);
 }


 public function findProduct(Request $request){

    $search=$request->input('search');

    $categorieAll=Categorie::all();
    $produitAll = Produit::where('designation', 'LIKE', '%' . $search . '%')
    ->OrWhere('prix', 'LIKE', '%' . $search . '%')->paginate(10);
    return view('clients.product',[
          'categorieAll'=>$categorieAll,
          'produitAll'=>$produitAll

        ]);
 }

 public function update_cart(Request $request){

    $id=$request->input('id');
    $produit = Produit::findOrFail($id);

    if(!$produit){
        return response()->json(['messages'=>'Un soucis c est produis !']);
    }

    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        if($request->qte > $produit->stock ){
            return response()->json(['messages'=>'Le nombre demandé n est pas disponible']);

        }
        $cart[$id]['qte_commande']=$request->qte;

    }
    session()->put('cart', $cart);
    return response()->json(['messages'=>'Produit mise à jour avec sucess !']);

}
}
