<?php

use App\Http\Controllers\ApiClientController;
use App\Http\Controllers\user\AdminControllers;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User\FournisseurController;
use \App\Http\Controllers\User\FactureController;
use \App\Http\Controllers\User\CategorieController;
use \App\Http\Controllers\User\ClientController;
use \App\Http\Controllers\User\ProduitController;
use \App\Http\Controllers\User\CommandeController;
use \App\Http\Controllers\User\AcceuilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth_admin'])->group(function(){

    Route::get('admin/listes_compte_users',[AdminControllers::class,'listes_users'])->name('users.compte');


    // fournisseur
Route::get('admin/fournisseur',[FournisseurController::class,'listes_fournisseur'])->name('listes.fournisseur');
Route::post('admin/ajout-fournisseur',[FournisseurController::class,'ajouter_fournisseur_traitement'])->name('ajouter.fournisseur');
Route::get('admin/fournisseur/detail/{id}',[FournisseurController::class,'details_fournisseur'])->name('details.fournisseur');
Route::post('admin/fournisseur/update/',[FournisseurController::class,'update_fournisseur'])->name('update.fourniseur');
Route::post('admin/fournisseur/recherche/',[FournisseurController::class,'recherche'])->name('recherche.fourniseur');
Route::get('admin/fournisseur/delete/{id}',[FournisseurController::class,'delete_fournissuer'])->name('delete.fournisseur');

// Categories
Route::get('admin/categorie',[CategorieController::class,'listes_categorie'])->name('listes.categorie');
Route::post('admin/ajout-categorie',[CategorieController::class,'ajouter_categorie_traitement'])->name('ajouter.categorie');
Route::get('admin/categorie/detail/{id}',[CategorieController::class,'details_categorie'])->name('details.categorie');
Route::post('admin/categorie/update/',[CategorieController::class,'update_categorie'])->name('update.categorie');
Route::get('admin/categorie/recherche_cat/',[CategorieController::class,'rechercher_categorie'])->name('rechercher.categorie');
Route::get('admin/categorie/delete/{id}',[CategorieController::class,'delete_categorie'])->name('delete.categorie');
// Client Partie administrateur
Route::get('admin/client',[ClientController::class,'listes_client'])->name('listes.client');
Route::get('admin/client/detail/{id}',[ClientController::class,'details_client'])->name('details.client');
Route::post('admin/client/update/',[ClientController::class,'update_client'])->name('update.client');
Route::post('admin/client/recherche/',[ClientController::class,'rechercher_client'])->name('rechercher.client');
// Produits

Route::get('admin/produit',[ProduitController::class,'liste_produit'])->name('listes.produit');
Route::post('admin/ajout-produit',[ProduitController::class,'ajouter_produit_traitement'])->name('ajouter.produit');
Route::get('admin/produit/detail/{id}',[ProduitController::class,'details_produit'])->name('details.produit');
Route::post('admin/produit/update/',[ProduitController::class,'update_produit'])->name('update.produit');
Route::get('admin/rechercher_produit/liste',[ProduitController::class,'rechercher_produit'])->name('rechercher.produit');
Route::get('admin/produit/delete/{id}',[ProduitController::class,'delete_produits'])->name('delete.produit');
Route::get('admin/store',[ProduitController::class,'addProduct'])->name('add.produit');

// Commandes

Route::get('admin/commande',[CommandeController::class,'liste_commande'])->name('listes.commande');
Route::get('admin/details_commande/{id}',[CommandeController::class,'detail_commande'])->name('details.commandes');
Route::get('admin/valider_commande/{id}',[CommandeController::class,'valider_commande'])->name('valider.commandes');
Route::post('/commande/rechercher_commande/',[CommandeController::class,'rechercher_commandes'])->name('rechercher.commandes');
// Factures

Route::get('admin/listes_factures',[FactureController::class,'listes_facture'])->name('listes.factures');
Route::get('admin/impression/factures_client/{id}',[FactureController::class,'imprime_factures'])->name('imprime.factures');

// Home page

//


Route::post('admin/new_compte_users/admin',[AdminControllers::class,'create_user'])->name('create.compte');
Route::get('admin/deconnexion/admin',[AdminControllers::class,'logout'])->name('logout.compte');
Route::get('admin/update_profile/admin/',[AdminControllers::class,'profile_update'])->name('details.admin');
Route::post('admin/update_users/admin',[AdminControllers::class,'update_profile_users'])->name('update.compte');
Route::post('admin/chercher_users/admin',[AdminControllers::class,'rechercher_users'])->name('users.search');
Route::get('admin/active_or_desactive/admin/{id}',[AdminControllers::class,'active_or_desactive_compte'])->name('changes.etat.compte');
Route::get('admin/dashboard',[AdminControllers::class,'home'])->name('home.admin');


});




Route::get('/details_product/{id}',[AcceuilController::class,'details_product'])->name('product.details');

//--------------------- Partie de traitement du client--------------------------
// GET
Route::get('/client/liste-byCategorie/{id}',[ClientController::class,'findProductByCategorie'])->name('client.findByProductCategorie');
Route::get('/client/supprimer-produit/{id}',[ClientController::class,'remove'])->name('client.remove.produit');
Route::get('/client/produitByCategorie/{id}',[ClientController::class,'productByCategorie'])->name('produitByCategorie');
Route::get('/client/liste-produitAll',[ClientController::class,'listes_produits'])->name('client.produitAll');

Route::get('/client_register',[ClientController::class,'register_client'])->name('register.client');
Route::get('/client/panier_client/',[ClientController::class,'showPanier'])->name('show.panier.client');
Route::get('/annulation_commande/client/{id}',[ClientController::class,'annulation_commande'])->name('client.commande.annulation');
Route::get('/logout_client',[ClientController::class,'logout'])->name('logout.client');
Route::get('/client/login',[ClientController::class,'login'])->name('login.client');
Route::get('/client/register',[ClientController::class,'register'])->name('register.client');

Route::post('/client/update-product',[ClientController::class,'update_cart'])->name('client.update.cart');


// POST
Route::get('/client/findProductByNameOrPrice',[ClientController::class,'findProduct'])->name('client.findProduct');

Route::post('/client/client_auth',[ClientController::class,'login_client'])->name('client.login.authentification');
Route::post('/client_create',[ClientController::class,'create_client'])->name('client.create.account');
Route::post('/update_panier_client',[ClientController::class,'update_panier'])->name('update.panier.client');
Route::post('/client_update_informations/update',[ClientController::class,'client_update_informations'])->name('client.update.informations');
Route::post('/client_update_password',[ClientController::class,'update_password_clients'])->name('update.password.client');
//----------------------- Fin traitement client ----------------------------------------------
// Admin authentification
Route::get('/login_admin/admin',[AdminControllers::class,'login'])->name('login.admin');
Route::post('/authentification/admin',[AdminControllers::class,'do_login'])->name('do_login.admin');

Route::get('/',[ClientController::class,'home'])->name('listes.acceuil');
Route::middleware(['auth_client'])->group(function (){
    Route::post('/validation/commande/client/',[ClientController::class,'valide_commande_login'])->name('valide.login.commande');
Route::get('/client/dahsbord/',[ClientController::class,'dashbord_client'])->name('client.dahsbord.panier');

});


Route::get('/client/produitAll',[ApiClientController::class,'index'])->name('auth.cors');
Route::get('getAllCategory',[ApiClientController::class,'getAllCategory'])->middleware('auth.cors');

Route::get('getAllImage/{filename}',[ApiClientController::class,'getImageProduct'])->middleware('auth.cors');
Route::post('/client/add-product',[ClientController::class,'addCart'])->middleware('auth.cors');

Route::get('/cartList',[ApiClientController::class,'getAllPanier'])->middleware('auth.cors');
Route::get('/Deletecart/{id}', [ApiClientController::class, 'deleteProductFromCart'])->middleware('auth.cors');
