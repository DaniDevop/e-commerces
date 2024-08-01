<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use Illuminate\Http\Request;
use App\Models\User\Produit;
use App\Models\User\Fournisseur;
use App\Models\User\Categorie;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProduitController extends Controller
{
    public function liste_produit(){
        $produits=DB::table('produits')
        ->leftJoin('categories', 'categories.id', '=', 'produits.categorie_id')
        ->select('produits.*','categories.categorie')
        ->orderByDesc('id')
        ->paginate(5)

        ;
        $categorieAll=Categorie::all();
        $numberProd=Produit::count();//
        $caracteres_aleatoires = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $codeProduit = 'PRD°' . substr(str_shuffle($caracteres_aleatoires), 0, 5).$numberProd;

         return view("produit.liste",compact('codeProduit','produits','categorieAll'));
    }



    public function ajouter_produit_traitement(AddProductRequest $request)//store
    {

        $produit = new Produit();
        $produit->designation = $request->designation;
        $produit->code = $request->code;
        $produit->prix = $request->prix;
        $produit->stock = $request->stock;
        $produit->categorie_id = $request->categorie_id;
        $image=$request->file('image');
        $imageName=time().'-'. $image->getClientOriginalExtension();
        $image->move('uploads/produit/',$imageName);
        $Imgmanager=new ImageManager(new Driver());
        $resizeImage=$Imgmanager->read('uploads/produit/'.$imageName);
        $resizeImage->resize(300,300);

        $resizeImage->save(public_path('uploads/store/'.$imageName));
        $produit->image=$imageName;
        $produit->save();
         toastr()->success("produit ajouté avec success ✨😃");
        return back();

    }


    public function details_produit($id){

        $produit = Produit::where('id', $id)->first();
        $fournisseurAll=Fournisseur::all();
        $categorieAll=Categorie::all();

        if (!$produit) {
        return redirect('/produit')->with('error', "produit n'a pas été trouvé");
        }

        return view('produit.detail', compact('produit','categorieAll','fournisseurAll'));
     }



     public function update_produit(Request  $request){//traitement
        $request->validate([
            'designation'=>'required',//les names
            'prix'=>'required',
            'stock'=>'required',
            'categorie_id'=>'required|exists:categories,id',//ici cest la jointure
            'image'=>'nullable|image|mimes:png,jpg,jpeg|max:2048',//ici cest la jointure

        ]);

        $produit=produit::find($request->id);
        $produit->designation = $request->designation;//1 base de donner et 2 le name de formulaire
        $produit->prix = $request->prix;
        $produit->stock = $request->stock;
        $produit->categorie_id = $request->categorie_id;
         if($request->hasFile("image")){
            $image=$request->file('image');
            $imageName=time().'-'. $image->getClientOriginalExtension();
            $image->move('uploads/produit/',$imageName);
            $Imgmanager=new ImageManager(new Driver());
            $resizeImage=$Imgmanager->read('uploads/produit/'.$imageName);
            $resizeImage->resize(300,300);

            $resizeImage->save(public_path('uploads/store/'.$imageName));
            $produit->image=$imageName;
        }


        $produit->update();
         toastr()->success("produit mise a jour avec success ✨😃");
        return back();

    }



    public function rechercher_produit(Request $request){
        $searchTerm = $request->search;

        $produits = DB::table('produits')
        ->join('categories', 'produits.categorie_id', '=', 'categories.id')
        ->join('fournisseurs', 'produits.fournisseur_id', '=', 'fournisseurs.id')
        ->where(function($query) use ($searchTerm) {
            $query->where('produits.id', 'LIKE', "%$searchTerm%")
                ->orWhere('produits.code', 'LIKE', "%$searchTerm%")
                ->orWhere('produits.designation', 'LIKE', "%$searchTerm%")
                ->orWhere('produits.prix', 'LIKE', "%$searchTerm%")
                ->orWhere('produits.stock', 'LIKE', "%$searchTerm%")
                ->orWhere('categories.categorie', 'LIKE', "%$searchTerm%")
                ->orWhere('fournisseurs.nom', 'LIKE', "%$searchTerm%");
        })
        ->select('produits.*','fournisseurs.nom','categories.categorie')
        ->paginate(5);


        $fournisseurAll=Fournisseur::all();
        $categorieAll=Categorie::all();
        $codeProduit=Produit::count();//

        return view("produit.liste",compact('codeProduit','produits','fournisseurAll','categorieAll'));
    }

    public function delete_produits($id){
        $produits=Produit::find($id);
        if(!$produits){
            toastr()->error("Produit introuvable ");
            return back();
        }
        $produits->delete();
        toastr()->success("Produit supprimer avec success !");
        return back();
    }


}
