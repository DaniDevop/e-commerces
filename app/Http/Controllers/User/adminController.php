<?php

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    //


    public function login(){
        return view("login");
    }


    public function do_login(Request $request){
        $credentials = $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        if(!Auth::attempt($credentials)){
           toastr()->error("Informations introuvable ou User inexistant");
           return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');

        }
        return redirect()->route('home');
    }

    public function create_user(Request $request){
        $data=$request->validate([
            'name' =>'required|exists:users,nom',
            'email' =>'nullable|exists:users,email',
            'password' =>'required|min:8',
            'confirm_password' =>'required|min:8',
        ]);
        $image="";
        $user=new User();
        $user->name=$data['name'];
        $user->email=$data['email']?:"";
        $user->active=true;
        if($request->hasFile('profile')){
            $image=$request->file('profile')->store('image','public');

        }
        $user->profile=$image;
        $user->password=Hash::make($data['password']);
         toastr()->success("Compte crée avec success ");
         return back();
    }
    public function listes_users(){
        $users=User::all();
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
            'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:5048',
            'id' => 'required'
        ]);
    
        $user = User::find($request->id);
        $user->name = $data['name'];
        $user->email = $data['email'];
    
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
    
}
