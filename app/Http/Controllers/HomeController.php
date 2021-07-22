<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');

        
    }

   
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }


    public function revenueTotalPerYear(){

        $coursesCurrentYear = Course::whereYear('created_at', date('Y'))->where('status','=',true)->get();
        $coursePreviousYear = Course::whereYear('created_at',date("Y",strtotime("-1 year")))->where('status','=',true)->get();
    
        $totalCurrentPerCourse = 0; 
        for($i=0; $i< $coursesCurrentYear->count(); $i++){
                if($coursesCurrentYear[$i]->students()->exists()){
                    $totalCurrentPerCourse += $coursesCurrentYear[$i]->students()->count() * $coursesCurrentYear[$i]->price; 
                }
        }

        $totalPreviousPerCourse = 0; 
        for($i=0; $i< $coursePreviousYear->count(); $i++){
                if($coursePreviousYear[$i]->students()->exists()){
                    $totalPreviousPerCourse += $coursePreviousYear[$i]->students()->count() * $coursePreviousYear[$i]->price; 
                }
        }
        
        $difference = ($totalCurrentPerCourse-$totalPreviousPerCourse)/100;
        
        return [
            'totalcurrent'   => $totalCurrentPerCourse,
            'difference'     => $difference,
        ];
    }

    public function getAllHigherCoursesWithRevenue(){
        $coursesArrayRevenue = [];
        $coursesSorted = [];
        $courses = Course::get()->sortBy(function($query){
            return $query->students()->count() * $query->price;
        })->take(8);

        for($i=0;$i<count($courses); $i++){
            array_push($coursesArrayRevenue,($courses[$i]->price * $courses[$i]->students()->count()).'MAD');
            array_push($coursesSorted,$courses[$i]->title);
        }

        return [
            'revenues' => $coursesArrayRevenue,
            'courses'  => $coursesSorted,
        ];
    }

    public function getStudents(){
        $students = Student::all();
        return $students;

    }

    public function getCourses(){
        $courses = Course::all();
        return $courses;
    }

    public function chartRevenue(){
        $revenues = $this->getAllHigherCoursesWithRevenue();
        $courses = $this->getAllHigherCoursesWithRevenue();
        // dd($revenues['revenues']);
        $sortedArray = Arr::sort($revenues['revenues']);    
        // dd(($sortedArray));

        $chart = LarapexChart::barChart()
        ->setTitle('Revenue Par Formation')
        ->setSubtitle('Les 5 Meilleurs Formations en terme de rentabilitée')
        ->addData('Revenue', $revenues['revenues'])      
        ->setXAxis($revenues['courses']);

        return $chart;
    }

    public function highRevenueCourse(){
        $courses = Course::all();
        $highrevenue=0;
        $course=null;

        for($i=0; $i<$courses->count(); $i++){
            if(($courses[$i]->price * $courses[$i]->students()->count()) > $highrevenue){
                $highrevenue = $courses[$i]->price * $courses[$i]->students()->count();
                $course = $courses[$i];
            }
        }
        return [
            'course'  => $course,
            'revenue' => $highrevenue,
        ];
    }

    

    public function root()
    {
        return view('index',
        [
          'course'        => $this->revenueTotalPerYear(),
          'students'      => $this->getStudents(),
          'courses'       => $this->getCourses(),
          'high'          => $this->highRevenueCourse(),
          'chart'         => $this->chartRevenue(),
        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'b_day' => ['required', 'date', 'before:today'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->b_day = date('Y-m-d', strtotime($request->get('b_day')));

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            if (file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }
            $user->avatar = '/images/' . $avatarName;
        }
        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "User Details Updated successfully!"
            ], 200); // Status code here
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Something went wrong!"
            ], 200); // Status code here
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code 
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
