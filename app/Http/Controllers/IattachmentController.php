<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Iattachment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class IattachmentController extends Controller
{
    public function store(Request $request){
        
        // dd($request->all());

        $myfile = $request->file('file');
        $fileName = 'attachment-'.time(). '.' . $myfile->extension();
        $myfile->move(public_path('instructors_attachment/'),$fileName);
        
        $instructor = Instructor::findOrFail($id);
        
        $attachment = new Iattachment();
        $attachment->name   = 'File-'.$fileName;
        $attachment->url    =  "instructors_attachment/".$fileName;
        $atachment->instructor_id = $instructor->id;
        $attachment->save();
        
        Toastr::success('Attachment Crée Avec Succée !');
        
        return response()->json(['success'=> $fileName]);
    }
}
