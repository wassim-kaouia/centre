<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 

    public function index(){

        $users = User::paginate(6);
        return view('users.index',['users' => $users]);
    }

    public function show(Request $request,$id){

        $user = User::findOrFail($id);
        
        return view('users.show',['user' => $user]);
    }

    public function create(){

        return view('users.add');
    }
    public function edit(Request $request,$id){

        $user = User::findOrFail($id);

        return view('users.edit',['user' => $user]);
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'full_name' => 'required|min:10|max:20',
            'name'      => 'required|string',
            'email'     => 'required|email',
            'avatar'    => 'mimes:png,jpg,jpeg',
            'sexe'      => 'required|string',
            'birth'     => 'required',
            'role'      => 'string',
            'password'  => 'required',
        ],[
            'full_name.required'     =>  'Le Nom Complet est requis',
            'name.required'          =>  'Le Nom est Requis',
            'email.required'         =>  "L'email est requis",
            'avatar.required'        =>  'La photo de profil est requise',
            'sexe.required'          =>  'Le sexe est requis',
            'birth.required'         =>  'La date de naissance est requise',
            'password.required'      =>  'Le Password est requis',  
        ]);

        $user = new User();
        $user->full_name = Str::lower($request->full_name);
        $user->name      = Str::lower($request->name);
        $user->email     = Str::lower($request->email);
        $user->sexe      = $request->sexe;
        $user->b_day     = date('Y-m-d', strtotime($request->birth));
        $user->password  = bcrypt($request->password);
        $user->role_id   = $request->role;

        //upload avatar - profile photo
        if (request()->has('avatar')) {            
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/utilisateurs/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = "/images/utilisateurs/" . $avatarName;
        }else{
            $user->avatar ='/profile_default.jpeg';
        }


        $user->save();

        Toastr::success('Utilisateur'.' '.$user->full_name.' est crée avec succée !');
        return redirect()->back();
    }

   

    public function profile_edit(Request $request){

        // dd($request->all());
        $user = User::findOrFail($request->userId);

        $request->validate([
            'full_name'      => ['required','min:3',Rule::unique('users')->ignore($request->userId)],  
            // 'password'       => [$request->password != null ? 'min:6' : '',Rule::unique('users')->ignore($request->userId)],   
            'password'       => [$request->password != null ? 'min:6' : ''],   
            'email'          => ['required','email',Rule::unique('users')->ignore($request->userId)],
            ]);

        //mise a jour
        $user->full_name = $request->full_name;
        $user->email     = $request->email;
        $user->password  = $request->password === null ? $user->password : Hash::make($request->password);
        $user->role_id   = $request->role;   
        $user->save();

        Toastr::success('Les données de '.$user->full_name." a été mise à avec succé !");

        return redirect()->back();
    }   
    

    public function destroy(Request $request){
        
        $user = User::findOrFail($request->user_id);
        
        //prohibit the delete of super admin
        if($user->id == 1) {
            Toastr::error('Vous pouvez pas supprimer le Super Administrateur ! ');
        }else{
           $user->delete();
           Toastr::success($user->full_name." a été supprimé avec succé !");
        }      
        return redirect()->back();
    }
}
