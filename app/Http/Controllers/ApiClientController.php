<?php

namespace App\Http\Controllers;

use App\Models\User\Categorie;
use App\Models\User\Produit;
use Illuminate\Http\Request;

class ApiClientController extends Controller
{
    

    public function index(){
        return Produit::with("categorie")->get();
    }


    public function getAllCategory(){
        return Categorie::all();
    }


    public function getAllPanier(){
        $cart =session()->get("cart",[]);

        if (empty($cart)) {
            // Renvoie un tableau vide
            return response()->json([]);
        }
    

        return response()->json(array_values($cart));
    }


    public function deleteProductFromCart($id) {
        $cart = session()->get('cart', []);
    
        // Vérifier si le produit existe dans le panier
        if(isset($cart[$id])) {
            unset($cart[$id]); // Supprime le produit du panier
            session()->put('cart', $cart); // Met à jour le panier dans la session
    
            return response()->json(['success' => true, 'message' => 'Produit supprimé du panier.']);
        }
    
        return response()->json(['success' => false, 'message' => 'Produit introuvable.']);
    }
    


    public function getImageProduct($image)
    {
        // Construire le chemin complet vers le fichier image
        $imagePath = public_path('uploads/store/' . $image);
    
        // Vérifiez si le fichier existe
        if (!file_exists($imagePath)) {
            return response()->json(['error' => 'Aucun fichier'], 404);
        }
    
        // Récupérez le contenu du fichier
        $imageContent = file_get_contents($imagePath);
    
        // Déterminez le type MIME du fichier
        $mimeType = mime_content_type($imagePath);
    
        // Retournez le contenu du fichier avec le type MIME approprié
        return response($imageContent, 200)->header('Content-Type', $mimeType);
    }
    
}
