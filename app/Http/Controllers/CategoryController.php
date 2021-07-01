<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('categories.index',['categories' => $categories]);
    }


    public function store(Request $request){

        $validation = $request->validate([
            'categorie_name' => 'required|min:3',
        ],[
            'categorie_name.required' => 'Le Nom de categorie est Requis',
            'categorie_name.min'    => 'Le Nom de categorie doit comporter 3 caractères'
        ]);

        $categorie = new Category();
    
        if($validation){
            $categorie->name = $request->categorie_name;
            $categorie->save();
            Toastr::success('La categorie '.$request->categorie_name." a été crée à avec succé !");
        }else{
            Toastr::error('La categorie '.$request->categorie_name." n'a pas été crée!");
        }

        return redirect()->back();
    }


    public function destroy(Request $request){
        $categorie = Category::findOrFail($request->selected_categorie);

        $categorie->delete();

        Toastr::success($categorie->name." a été supprimé avec succé !");

        return redirect()->back();

    }

}
