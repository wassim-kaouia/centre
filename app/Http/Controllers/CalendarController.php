<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            //if the method has received an ajax request from the view
            $data = Course::latest()->get();
            
            //send data to events option in view
            return response()->json($data);                 
        }
        
        return view('calendar.index');
    }
}
