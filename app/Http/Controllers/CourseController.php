<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    
    public function index(){
        
        $courses  = Course::where('status','=',true)->get();
        $students = Student::take(6)->get();

        return view('courses.index',[
            'courses'  => $courses,
            'students' => $students,
        ]);
    }

    public function create(){

        $instructors = Instructor::all();
        $categories  = Category::all();

        return view('courses.add',[
            'instructors' => $instructors,
            'categories'  => $categories,
        ]);
    }

    

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title'        => 'required|min:4|max:100',
            'description'  => 'required',
            'start'        => 'required',
            'end'          => 'required',
            'thumbnail'    => 'required|mimes:png,jpg,jpeg',
            'price'        => 'required|numeric',
            'langue'       => 'string',
            'what_learn'   => 'required',
            'difficulty'   => 'numeric',
            'limit'        => 'numeric',
        ],[
            'title.required'        => 'Le titre est requis',
            'description.required'  => 'La description est requise',
            'start.required'        => 'La date de debut est requise',
            'end.required'          => 'La date de fin est requise',
            'thumbnail.required'    => 'La Thumbnail est requise',
            'thumbnail.mimes'       => 'La Thumbnail peut comprendre que : PNG,JPG,JPEG',
            'price.required'        => 'Le prix est requis',
            'what_learn.required'   => 'Le contenue de formation est requis', 
            'limit.numeric'         => 'Le nombre doit etre entier',          
        ]);
        
        $course = new Course();
        
        $course->title        = Str::ucfirst($request->title);
        $course->subtitle     = $request->subtitle === null ? '' : $request->subtitle;
        $course->description  = Str::ucfirst($request->description);
        $course->start_date   = date('Y-m-d', strtotime($request->start_date)); 
        $course->end_date     = date('Y-m-d', strtotime($request->end_date));
        $course->price        = $request->price;
        $course->isDiscounted = $request->discountable === 'on' ? true : false;
        $course->langue       = Str::lower($request->langue);
        $course->what_to_learn= $request->what_learn;
        $course->difficulty   = $request->difficulty;
        $course->category_id  = $request->category;
        $curse->student_limit = $request->limit;
        $course->isCertified  = $request->is_certified === 'on' ? true : false;
        $course->discount     = $request->discountable === 'on' ? $request->discount : 0;
        
        if(Auth::user()->role->name === 'Admin'){
            $course->status = true;
        }else if(Auth::user()->role->name === 'Secretariat'){
            $course->status = false;
        }else{
            $course->status = false;
        }
        if($request->category == 0){
            Toastr::error('Il Faut Créer Une Categorie !');
            return redirect()->back();
        }else{
            $course->category_id  = $request->category;
        }
        
        //upload thumbnail 
        if (request()->has('thumbnail')) {            
            $thumbnail     = request()->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = public_path('/courses/thumbnails/');
            $thumbnail->move($thumbnailPath, $thumbnailName);
            //save in DB
            $course->thumbnail = "/courses/thumbnails/" . $thumbnailName;
        }
    

        //associate the course to an instructor
        if($request->formateur == 0){
            Toastr::error('Il faut créer un Formateur avant la formation');
            return redirect()->back();
        }

        $instructor = Instructor::find($request->formateur);
        $course->instructor_id = $instructor->id;
        $course->save();

        Toastr::success('Formation Crée avec Succée !');
        return redirect()->back();
    }

    public function pendingCourses(Request $request){

        return view('courses.pending');
    }

    public function approuveCourse(Request $request,$id,$apprver){

        $approuver = User::findOrFail($apprver);
        $course    = Course::findorFail($id);

        $course->status = true;
        $course->save();

        Toastr::success('Formation Approuvée');

        return redirect()->back();
    }
}
