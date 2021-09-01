<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutus(){
       $aboutus = About::exists() ? About::first() : null;
       return view('about.aboutus',['aboutus' => $aboutus]); 
    }

    public function store(Request $request){
        $aboutus = new About();

        $aboutus->content = $request->content;
        $aboutus->save();

        session()->flash('success','Page Crée avec succée !');

        return redirect()->back();
    }

    public function update(Request $request){
        $aboutus = About::first();

        $aboutus->content = $request->content;
        $aboutus->save();

        session()->flash('success','Page Modifiée avec succée !');

        return redirect()->back();
    }
}
