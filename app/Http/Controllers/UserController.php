<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function edit(Request $request,$id){

        $user = User::findOrFail($id);

        return view('users.edit',['user' => $user]);
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
