<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Sattachment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SattachmentController extends Controller
{
    public function store(Request $request){
        
        // dd($request->all());

        $myfile = $request->file('file');
        $fileName = 'attachment-'.time(). '.' . $myfile->extension();
        $myfile->move(public_path('students_attachment/'),$fileName);
        
        $student = Student::findOrFail($id);
        
        $attachment = new Sattachment();
        $attachment->name   = 'File-'.$fileName;
        $attachment->url    =  "students_attachment/".$fileName;
        $atachment->student_id = $student->id;
        $attachment->save();
        
        Toastr::success('Attachment Crée Avec Succée !');
        
        return response()->json(['success'=> $fileName]);
    }
}
