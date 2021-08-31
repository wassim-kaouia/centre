<?php

namespace App\Http\Controllers;

use App\Mail\EmailToAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     => 'email',
            'subject'   => 'string',
            'message'   => 'string',
        ]);

        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ];

        Mail::send(new EmailToAdmin($data));
        
        session()->flash('success','Merci ! Votre message est bien envoyé.');
        return redirect()->back();
        
    }
}
