<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();

        return view('tags.index',['tags' => $tags]);
    }


    public function store(Request $request){

        $validation = $request->validate([
            'tag_name' => 'required|min:3',
        ],[
            'tag_name.required' => 'Le Nom de Tag est Requis',
            'tag_name.min'    => 'Le Nom de Tag doit comporter 3 caractères'
        ]);

        $tag = new Tag();
    
        if($validation){
            $tag->name = $request->tag_name;
            $tag->save();
            Toastr::success('Le Tag '.$request->tag_name." a été crée à avec succé !");
        }else{
            Toastr::error('Le Tag '.$request->tag_name." n'a pas été crée!");
        }

        return redirect()->back();
    }


    public function destroy(Request $request){
        $tag = Tag::findOrFail($request->selected_tag);

        $tag->delete();

        Toastr::success($tag->name." a été supprimé avec succé !");

        return redirect()->back();

    }

}
