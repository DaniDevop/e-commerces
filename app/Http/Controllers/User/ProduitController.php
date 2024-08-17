<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProduitRequest;
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
        $produits=Produit::with('categorie')->orderBy('id','desc')->paginate(10);

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
        $produit->prix = $request->prix;
        $produit->stock = $request->stock;
        $produit->categorie_id = $request->categorie_id;
        $image=$request->file('image');
        $imageName=time().'-'. $image->getClientOriginalExtension();
        $image->move('uploads/produit/',$imageName);
        $Imgmanager=new ImageManager(new Driver());
        $resizeImage=$Imgmanager->read('uploads/produit/'.$imageName);
        $resizeImage->resize(300,300);
        $produit->code='';
        $resizeImage->save(public_path('uploads/store/'.$imageName));
        $produit->image=$imageName;
        $produit->save();
         toastr()->success("produit ajouté avec success ✨😃");
        return back();

    }


    public function details_produit($id){

        $product = Produit::where('id', $id)->first();
        $categorieAll=Categorie::all();

        if (!$product) {
        return redirect('/produit')->with('error', "produit n'a pas été trouvé");
        }

        return view('produit.detail', compact('product','categorieAll'));
     }



     public function update_produit(UpdateProduitRequest  $request){//traitement
       

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

       
         $produits=Produit::where('produits.designation', 'LIKE', "%$searchTerm%")
         ->orWhere('produits.prix', 'LIKE', "%$searchTerm%")
         ->orWhere('produits.stock', 'LIKE', "%$searchTerm%")
          ->paginate(5);;

        $categorieAll=Categorie::all();
        $codeProduit=Produit::count();//

        return view("produit.liste",compact('codeProduit','produits','categorieAll'));
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



    public function addProduct(){

        $categorieAll=Categorie::all();
        $numberProd=Produit::count();//
        $caracteres_aleatoires = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $codeProduit = 'PRD°' . substr(str_shuffle($caracteres_aleatoires), 0, 5).$numberProd;
        return view("produit.store",[
            'categorieAll'=>$categorieAll,
            'codeProduit'=>$codeProduit
        ]);
    }


}
