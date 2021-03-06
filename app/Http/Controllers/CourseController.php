<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Review;
use App\Models\Student;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

    public function edit(Request $request , $id){

        $course = Course::findOrFail($id);
        $instructors = Instructor::all();

        return view('courses.edit',[
            'course'       => $course,
            'instructors'  => $instructors,
        ]);
    }

    public function update(Request $request){
        // dd($request->all());
        $request->validate([
            'title'        => 'required|min:4|max:100',
            'description'  => 'required',
            'start'        => 'required',
            'end'          => 'required',
            'thumbnail'    => 'mimes:png,jpg,jpeg',
            'price'        => 'required|numeric',
            'langue'       => 'string',
            'what_learn'   => 'required',
            'difficulty'   => 'numeric',
            'limit'        => 'numeric',
            'pourcentage'  => 'required|numeric',
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

        $course = Course::findOrFail($request->course_id);
        
        $course->title        = Str::ucfirst($request->title);
        $course->subtitle     = $request->subtitle === null ? '' : $request->subtitle;
        $course->description  = Str::ucfirst($request->description);
        $course->start        = date('Y-m-d', strtotime($request->start)); 
        $course->end          = date('Y-m-d', strtotime($request->end));
        $course->price        = $request->price;
        $course->isDiscounted = $request->discountable === 'on' ? true : false;
        $course->langue       = Str::lower($request->langue);
        $course->what_to_learn= $request->what_learn;
        $course->difficulty   = $request->difficulty;
        $course->category_id  = $request->category;
        $course->pourcentage_instructor  = $request->pourcentage;
        $course->student_limit= (int)$request->limit;
        $course->isCertified  = $request->is_certified === 'on' ? true : false;
        $course->discount     = $request->discountable === 'on' ? $request->discount : 0;
        
        
        $thumbnail_path = public_path($course->thumbnail);
        if (request()->has('thumbnail')) {    
            //delete image from application folder 
            if(File::exists($thumbnail_path)){
                File::delete($thumbnail_path);
            }

            $thumbnail     = request()->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = public_path('/courses/thumbnails/');
            $thumbnail->move($thumbnailPath, $thumbnailName);
            //save in DB
            $course->thumbnail = "/courses/thumbnails/" . $thumbnailName;
            Toastr::success('Image Upload?? avec succ??e !');
        }

        $course->save();
        Toastr::success('Formation modifi?? avec succ??e !');

        return redirect()->back();

    }

    public function store(Request $request){
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
            'pourcentage'  => 'required|numeric',
            // 'requirements' => 'required|string', 
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
            'pourcentage.required'  => 'Le pourcentage % est requis',
            // 'requirements.required' => 'Le pr??-requis sont obligatoires'      
        ]);
        
        $course = new Course();
        
        $course->title        = Str::ucfirst($request->title);
        $course->subtitle     = $request->subtitle === null ? '' : $request->subtitle;
        $course->description  = Str::ucfirst($request->description);
        $course->start        = date('Y-m-d', strtotime($request->start)); 
        $course->end          = date('Y-m-d', strtotime($request->end));
        $course->price        = $request->price;
        $course->isDiscounted = $request->discountable === 'on' ? true : false;
        $course->langue       = Str::lower($request->langue);
        $course->what_to_learn= $request->what_learn;
        $course->difficulty   = $request->difficulty;
        $course->category_id  = $request->category;
        $course->student_limit= (int)$request->limit;
        $course->pourcentage_instructor  = $request->pourcentage;
        $course->isCertified  = $request->is_certified === 'on' ? true : false;
        $course->discount     = $request->discountable === 'on' ? $request->discount : 0;
        $course->color        = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        // $course->requirement  = $request->requirements;
        
        if(Auth::user()->role->name === 'Admin'){
            $course->status = true;
        }else if(Auth::user()->role->name === 'Secretariat'){
            $course->status = false;
        }else{
            $course->status = false;
        }
        if($request->category == 0){
            Toastr::error('Il Faut Cr??er Une Categorie !');
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
            Toastr::error('Il faut cr??er un Formateur avant la formation');
            return redirect()->back();
        }

        $instructor = Instructor::find($request->formateur);
        $course->instructor_id = $instructor->id;
        $course->save();

        Toastr::success('Formation Cr??e avec Succ??e !');
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

        Toastr::success('Formation Approuv??e');
        
        return redirect()->back();
    }

    // front section controller

    public function show_courses_front(){

        $courses = Course::where('status','=',true)->paginate(2);

        return view('front.courses',[
            'courses' => $courses,
        ]);
    }

    public function calculateReviews($c){
        $course = Course::find($c);
        $nbr_reviews = $course->reviews->count();
        $avg_reviews = 0;
        $some_reviews= 0;

        for($i=0; $i<$course->reviews->count(); $i++){
            $some_reviews+=$course->reviews[$i]->stars;
        }
        return $nbr_reviews == 0 ? 0 : $some_reviews/$nbr_reviews;
    }

    public function calculateReviewsPerInstructor($c){
        $course = Course::find($c);
        $instructor = $course->instructor;
        $nbr_reviews_instructor=0;
        $some_reviews_instructor=0;
        
        for($i=0; $i<$instructor->courses->count(); $i++){
            $nbr_reviews_instructor  += $instructor->courses[$i]->reviews->count();
            for($j=0; $j<$instructor->courses[$i]->reviews->count(); $j++){
                $some_reviews_instructor += $instructor->courses[$i]->reviews[$j]->stars;              
            }
        }
        $reviews_array = [
            'nbr'     => $nbr_reviews_instructor,
            'stars'   => $nbr_reviews_instructor == 0 ? 0 : round($some_reviews_instructor/$nbr_reviews_instructor),
        ];
        return $reviews_array;
    }

    public function show_detail(Request $request,$id,$category){
        
        $mycourse = Course::find($id);
        $nbr_students = 0;
        $instructor = $mycourse->instructor;

        $relatedCourses = Course::whereHas('category',function($query) use($category){
            $query->where('name',$category);
        })->take(3)->get();

    
        foreach($instructor->courses as $course){
            $nbr_students+=$course->students->count();
        }

        $req = $mycourse->requirement;
        
        $requirements = explode('/',$req);

        $reviews = Review::where('course_id',$id)->paginate(10);
        
        $avgReviews = $this->calculateReviews($id);

        $instructor_array= $this->calculateReviewsPerInstructor($id);

        return view('front.course_detail',[
            'specific_course'        => $mycourse,
            'nbr_students'           => $nbr_students,
            'requirements'           => $requirements,
            'reviews'                => $reviews,
            'relatedCourses'         => $relatedCourses,
            'avgReviews'             => $avgReviews,
            'instructor_review_array'=> $instructor_array,
        ]);
    }

    
    


}
