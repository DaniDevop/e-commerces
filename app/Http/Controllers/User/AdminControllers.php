<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Commande;
use App\Models\User\Fournisseur;
use App\Models\User\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminControllers extends Controller
{
    //

    public function login(){

        /*$users=new User();
        $users->name="Admin";
        $users->email="admin@example.com";
        $users->password=Hash::make("daniel");
        $users->profile="";
        $users->active=true;
        $users->save();*/
        return view("login");
    }

    public function home(){
        $produitCount=Produit::count();
        $fournisseurCount=Fournisseur::count();
        $commandesCount=Commande::count();
        $sommeFacture = DB::select("SELECT SUM(produits.prix * detail_commandes.qte_commande) AS sommeFacture
        FROM produits, detail_commandes
        WHERE produits.id = detail_commandes.produit_id")[0]->sommeFacture;

        $commandes=DB::table('commandes')
        ->join('clients','commandes.client_id','=','clients.id')
        ->where('date',date('Y-m-d'))
        ->select('commandes.*','clients.nom')
        ->orderByDesc('id')
        ->paginate(5)
        
        ;

        return view('index',compact('commandes','sommeFacture','produitCount','fournisseurCount','commandesCount'));
    }
    public function profile_update($id){
        $user=User::find($id);
        if(!$user){
            toastr()->error("Utilisateur introuvable ");
            return back();
        }

        return view("update_profile",compact("user"));
    }


    public function do_login(Request $request){
        $credentials = $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        if(!Auth::attempt($credentials) ){
           toastr()->error("Informations introuvable ou User inexistant");
           return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');

        }
       
        return redirect()->route('home');
    }

    public function create_user(Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'password' => 'required|min:5',
            'tel'=>'nullable',
            'confirm_password' => 'required|min:5|same:password', // Ensure confirm_password matches password
        ]);
        $userExist = User::where('email',$request->email)->orWhere('tel',$request->tel)->first();
        
        if($userExist){
            toastr()->error("Téléqhone ou email déjà existant dans la base de données");
            return back();
        }
    
        $image = "";
    
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'] ?: "";
        $user->tel = $data['tel'] ?: "";
        $user->role = $request->role ?:"User";
        $user->active=false;
        if ($request->hasFile('profile')) {
            $image = $request->file('profile')->store('image', 'public');
        }
    
        $user->profile = $image;
        $user->password = Hash::make($data['password']);
    
        $user->save();
    
        toastr()->success("Compte créé avec succès");
        return back();
    }
    
    public function listes_users(){
        $users=User::paginate(5);
        return view("listes_users",compact('users'));
    }

    public function update_users($id){
        $users=User::find($id);
        if(!$users){
            toastr()->error('Aucun compte associé n a été trouvé');
            return back();
        }
        return view("update_profile",compact('users'));
    }
    public function update_profile_users(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'tel'=>"nullable",
            'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:5048',
            'id' => 'required'
        ]);
    
        $user = User::find($request->id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->tel = $data['tel'] ?:"";
        $user->role = $request->role ?:"User";

        if ($request->hasFile('profile')) {
            // Delete the old profile image
            Storage::disk('public')->delete($user->profile);
    
            // Store the new profile image
            $profilePath = $request->file('profile')->store('images', 'public');
            $user->profile = $profilePath;
        }
    
        $user->save();
    
        toastr()->info("Informations modifiées avec succès");
        return back();
    }


    public function update_password_users(Request $request){
        $data = $request->validate([
            'ancien_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
            'id' => 'required'
        ]);
    
        $user = User::find($request->id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if(!$data['new_password'] != $data['confirm_password']){
            toastr()->warning("Les mots de passes sont diffirents");
            return back();
        }
    
        if (!Hash::check($request->new_passord,$user->password)) {
            toastr()->warning("Le mot de passes est incorrect");
            return back();
        }
    
        $user->password =Hash::make($request->new_passord);
        $user->update(); 
        toastr()->info("Informations modifiées avec succès");
        return back();
    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login.admin');
    }
    public function rechercher_users(Request $request){
        $searchTerm = $request->search;

        $users= User::where(function($query) use ($searchTerm) {
            $query->where('id', 'LIKE', "%$searchTerm%")
                  ->orWhere('name', 'LIKE', "%$searchTerm%")
                  ->orWhere('tel', 'LIKE', "%$searchTerm%")
                  ->orWhere('role', 'LIKE', "%$searchTerm%")
                  ->orWhere('email', 'LIKE', "%$searchTerm%");
        })->paginate(5);

        return view("listes_users",compact('users'));
    }

    public function active_or_desactive_compte($id){
        $users=User::find($id);
        if(!$users){
            toastr()->error(" Utilisateur introuvable");
            return back();
        }
        if($users->active){
            $users->active=false;
            $message="Opération reussie Compte désactivé";
        }else{
            $users->active=true;
            $message="Opération reussie Compte activé";

        }
        $users->save();
        toastr()->info( $message);
        return back();
    }




   
}
