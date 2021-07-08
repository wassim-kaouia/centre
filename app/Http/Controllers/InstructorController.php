<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\StudentMail;
use App\Models\Instructor;
use App\Models\Iattachment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\InstructorRequest;

class InstructorController extends Controller
{
    public function index(){

        $instructors = Instructor::all();

        return view('instructors.index',['instructors' => $instructors]);
    }

    public function create(){
        
        return view('instructors.add');
    }

    public function store(InstructorRequest $request){
        
        //create user for student
        $user = new User();
        $user->full_name       = Str::lower($request->first_name.' '.$request->last_name);
        $user->name            = Str::lower($request->first_name);
        $user->email           = Str::lower($request->email);
        $user->sexe            = $request->sexe;
        $user->password        = bcrypt($request->first_name.'2021');
        $user->b_day           = date('Y-m-d', strtotime($request->birth));
        $user->role_id         = 3;
        
        //upload avatar - profile photo
        if (request()->has('avatar')) {            
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/formateurs/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = "/images/formateurs/" . $avatarName;
        }else{
            $user->avatar ='/profile_default.jpeg';
        }

        $user->save();
        //create student 
        $instructor = new Instructor();
        $instructor->first_name    = Str::lower($request->first_name);
        $instructor->last_name     = Str::lower($request->last_name);
        $instructor->nationality   = Str::lower($request->nationality);
        $instructor->age           = $request->age;
        $instructor->cin           = Str::upper($request->cin);
        $instructor->address       = Str::lower($request->address);
        $instructor->gsm           = $request->gsm;
        $instructor->study_level   = $request->study_level;
        $instructor->photo_profile = $user->avatar;
        $instructor->user_id       = $user->id;

        $instructor->save();

        // Mail::to($request->email)->send(new StudentMail($request->first_name.'2021'));

        Toastr::success('Formateur crée avec succée');

        return redirect()->back();
    }

    public function show(Request $request,$id){
        $instructor = Instructor::findOrFail($id);

        return view('instructors.show',['instructor' => $instructor]);
    }

    public function edit(Request $request,$id){
        $instructor = Instructor::findOrFail($id);

        return view('instructors.edit',['instructor' => $instructor]);
    }


    public function update(Request $request,$id){

        $instructor = Instructor::findOrFail($id);
        
        $request->validate([
            'first_name'  => '',
            'last_name'   => '',
            'nationality' => '',
            'age'         => 'numeric',
            'cin'         => 'alpha_num',
            'email'       =>  'email',
            'address'     => 'max:255',
            'gsm'         => 'numeric',
        ]);

        //il faut regler uppercase and lowercase 
        $instructor->first_name    = Str::lower($request->first_name);
        $instructor->last_name     = Str::lower($request->last_name);
        $instructor->nationality   = Str::lower($request->nationality);
        $instructor->age           = $request->age;
        $instructor->cin           = Str::upper($request->cin);
        $instructor->address       = Str::lower($request->address);
        $instructor->gsm           = $request->gsm;
        $instructor->study_level   = $request->study_level;

        $image_path = public_path($instructor->photo_profile);
        if (request()->has('avatar')) {    
            //delete image from application folder 
            if(File::exists($image_path)){
                $instructor->photo_profile === '/profile_default.jpeg' ? '' : File::delete($image_path);
            }
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/formateurs');
            $avatar->move($avatarPath, $avatarName);


            $instructor->photo_profile = "/images/formateurs/" . $avatarName;
            Toastr::success('Image Uploadé avec succée !');
        }
        
        $instructor->save();
      
        //update user of student information
        $user = User::findOrFail($instructor->user_id);
        
        $user->full_name = $instructor->first_name.' '.$instructor->last_name;
        $user->email = $request->email;
        $user->b_day = date('Y-m-d', strtotime($request->birth));
        $user->avatar = $instructor->photo_profile;
        $user->save();

        Toastr::success('Formateur Modifié avec succée !');
        
        return redirect()->back();
    }

    public function upload_documents(Request $request){
        
        // dd($request->file);

        if($request->file === null){
            Toastr::error('Tu dois inclure un document !');
            return redirect()->back();
        }

        $request->validate([
            'file' => 'mimes:pdf,jpg,jpeg,png'
        ]);

        $myfile = $request->file('file');
        $fileName = 'attachment-'.time(). '.' . $myfile->extension();
        $myfile->move(public_path('instructors_attachments/'),$fileName);
                
        $attachment = new Iattachment();
        $attachment->name   = $request->document_type;
        $attachment->url    =  "instructors_attachments/".$fileName;
        $attachment->instructor_id = $request->instructor_id;
        $attachment->save();
        
        Toastr::success('Attachment Crée Avec Succée !');
        
        return redirect()->back();
    }

    public function download_document($id){
        $attachment = Iattachment::findOrFail($id);

        return response()->download(public_path($attachment->url));
    }

    public function view_document($id){
        $attachment = Iattachment::findOrFail($id);

        return response()->file(public_path($attachment->url));
    }

    public function destroy_document(Request $request){
        
        $attachment = Iattachment::findOrFail($request->attachment_id);
    
        $attachment->delete();
        Toastr::success($attachment->name." a été supprimé avec succé !");
           
        return redirect()->back();
    }
}
