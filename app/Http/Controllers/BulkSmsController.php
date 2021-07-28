<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Course;
use App\Models\Student;
use Twilio\Rest\Client;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class BulkSmsController extends Controller {

    public function index(){
        
        //bring all the students 
        $students      = Student::all();
        //bring all the instructors
        $instructors   = Instructor::all();

        //bring all courses
        $courses = Course::all();

        return view('promotions.index',[
            'students'    => $students,
            'instructors' => $instructors,
            'courses'     => $courses,
        ]);
    }

    public function dataToViewOnRequest(Request $request,$id){

        $request->validate([
            'id' => 'numeric',
        ]);

        $course = Course::where('id','=',$id)->with(['students'])->get();

        
        return response()->json($course);

    }

    public function sendSMS(Request $request){
        // Your Account SID and Auth Token from twilio.com/console
        //bring data inserted in env file
        $sid    = env( 'TWILIO_SID' );
        $token  = env( 'TWILIO_TOKEN' );
        $client = new Client( $sid, $token );

        $numbers_in_arrays = [];
        foreach($request->liste as $id => $value){
            $student = Student::find($id);
            $phone_without_zero   = ltrim($student->gsm,0);
            array_push($numbers_in_arrays,'+212'.$phone_without_zero);
        }
        //get the message entry in the view
        $message = $request->message;
        //counter of numbers
        $count = 0;
         
        //loop to count the numbers in the array
        foreach( $numbers_in_arrays as $number )
        {
            $count++;

            //send msg to twilio
            $client->messages->create(
                $number,
                [
                    'from' => env( 'TWILIO_FROM' ),
                    'body' => $message,
                ]
            );
        }

        Toastr::success('SMS envoyés avec succée');
        //back to view if succeeded 
        return redirect()->back();


    }

    //method responible of sending sms to group of numeros sepearated by gamma,  
    public function sendSmss(Request $request){
       // Your Account SID and Auth Token from twilio.com/console
       //bring data inserted in env file
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_TOKEN' );
       $client = new Client( $sid, $token );
        
       //validate if data entry is ok
       $validator = Validator::make($request->all(), [
           'numbers' => 'required',
           'message' => 'required'
       ]);

       //check whether the validation is ok
       if ( $validator->passes() ) {
           //put in array numbers that are seperated by gamma 
           $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );

           //get the message entry in the view
           $message = $request->input( 'message' );
           //counter of numbers
           $count = 0;
            
           //loop to count the numbers in the array
           foreach( $numbers_in_arrays as $number )
           {
               $count++;

               //send msg to twilio
               $client->messages->create(
                   $number,
                   [
                       'from' => env( 'TWILIO_FROM' ),
                       'body' => $message,
                   ]
               );
           }
           //back to view if succeeded 
           return back()->with( 'success', $count . " messages sent!" );
              
       } else {
           //back to view with errors
           return back()->withErrors( $validator );
       }
   }
}
