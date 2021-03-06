<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Student;
use App\Mail\StudentMail;
use App\Models\Sattachment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{


    public function index(){

        $students = Student::all();

        return view('students.index',['students' => $students]);
    }

    public function create(){
        
        return view('students.add');
    }

    public function store(StudentRequest $request){

        //create user for student
        $user = new User();
        $user->full_name       = Str::lower($request->first_name.' '.$request->last_name);
        $user->name            = Str::lower($request->first_name);
        $user->email           = Str::lower($request->email);
        $user->sexe            = $request->sexe;
        $user->password        = bcrypt($request->first_name.'2021');
        $user->b_day           = date('Y-m-d', strtotime($request->birth));
        $user->role_id         = 4;
        
        //upload avatar - profile photo
        if (request()->has('avatar')) {            
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/etudiants');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = "/images/etudiants/" . $avatarName;
        }else{
            $user->avatar ='/profile_default.jpeg';
        }
        
        $user->save();
        //create student 
        $student = new Student();
        $student->first_name    = Str::lower($request->first_name);
        $student->last_name     = Str::lower($request->last_name);
        $student->nationality   = Str::lower($request->nationality);
        $student->age           = $request->age;
        $student->cin           = Str::upper($request->cin);
        $student->address       = Str::lower($request->address);
        $student->gsm           = $request->gsm;
        $student->study_level   = $request->study_level;
        $student->photo_profile = $user->avatar;
        $student->user_id       = $user->id;
        
        $student->save();

        // Mail::to($request->email)->send(new StudentMail($request->first_name.'2021'));

        Toastr::success('Etudiant cr??e avec succ??e');

        return redirect()->back();
    }
    
    public function show(Request $request,$id){
        $student = Student::findOrFail($id);

        return view('students.show',['student' => $student]);
    }

    public function edit(Request $request,$id){
        $student = Student::findOrFail($id);
        $formations = Course::where('status','=',true)->get();
        
        return view('students.edit',[
            'student'    => $student,
            'formations' => $formations,
        ]);
    }
    
    public function bookCourse(Request $request){
        // dd($request->all());         
        $student_id   = $request->student_id;
        $course_id    = $request->formation;

        $student   = Student::find($student_id);
        $course    = Course::find($course_id);

        $payment = Payment::where('course_id','=',$course->id)->where('student_id','=',$student->id)->exists();
        // dd($payment);
        $exists = $student->courses->contains($course->id);
        if($exists && $payment){
           Toastr::error("L'??tudiant d??ja Inscris Dans Cette Formation");
           return redirect()->back();
        }else{
           //$student->courses()->syncWithoutDetaching([$course->id]);
           Toastr::success("Vous passez ?? la phase de paiement");
           return view('payments.create',[
               'student' => $student,
               'course'  => $course,
            ]);
        }
    }

    public function getStudent(Request $request,$id){
        $students = Student::findOrFail($id);

        $courses = $students->courses;
        return $courses;
    }

    public function deleteBookedCourse(Request $request){
        $course_id   = $request->course_id;
        $student_id = $request->student_id;

        $student   = Student::find($student_id);
        $course = Course::find($course_id);
        
        $student->courses()->detach([$course->id]);
        PaymentDetail::where('payment_id','=',$course->payment->id)->delete();
        $course->payment->delete();
        Toastr::success("La Formation est supprim??e avec succ??e");
        return redirect()->back();
    }
    
    public function update(Request $request,$id){

        $student = Student::findOrFail($id);
        
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

        $student->first_name    = Str::lower($request->first_name);
        $student->last_name     = Str::lower($request->last_name);
        $student->nationality   = Str::lower($request->nationality);
        $student->age           = $request->age;
        $student->cin           = Str::upper($request->cin);
        $student->address       = Str::lower($request->address);
        $student->gsm           = $request->gsm;
        $student->study_level   = $request->study_level;

        $image_path = public_path($student->photo_profile);
        if (request()->has('avatar')) {    
            //delete image from application folder 
            if(File::exists($image_path)){
                File::delete($image_path);
            }

            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);


            $student->photo_profile = "/images/" . $avatarName;
            Toastr::success('Image Upload?? avec succ??e !');
        }
    
        $student->save();
      
        //update user of student information
        $user = User::findOrFail($student->user_id);
        
        $user->full_name = $student->first_name.' '.$student->last_name;
        $user->email = $request->email;
        $user->b_day = date('Y-m-d', strtotime($request->birth));
        $user->avatar = $student->photo_profile;
        $user->save();

        Toastr::success('Etudiant Modifi?? avec succ??e !');
        
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
        $myfile->move(public_path('students_attachments/'),$fileName);
                
        $attachment = new Sattachment();
        $attachment->name   = $request->document_type;
        $attachment->url    =  "students_attachments/".$fileName;
        $attachment->student_id = $request->student_id;
        $attachment->save();
        
        Toastr::success('Attachment Cr??e Avec Succ??e !');
        
        return redirect()->back();
    }

    public function download_document($id){
        $attachment = Sattachment::findOrFail($id);

        return response()->download(public_path($attachment->url));
    }

    public function view_document($id){
        $attachment = Sattachment::findOrFail($id);

        return response()->file(public_path($attachment->url));
    }

    public function destroy(Request $request){
        
        $attachment = Sattachment::findOrFail($request->attachment_id);
    
        $attachment->delete();
        Toastr::success($attachment->name." a ??t?? supprim?? avec succ?? !");
           
        return redirect()->back();
    }

}
