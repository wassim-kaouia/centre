<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        $partners = Partner::all();
        return view('partners.create',['partners' => $partners]);
    }

    public function store(Request $request){

        $request->validate([
            'logo' => 'required|mimes:png,jpg,jpeg',
            'name' => 'required|string|max:30',
        ]);

        $thepartner = new Partner();
        $thepartner->name = $request->name;
        $thepartner->link = $request->link == null ? '' : $request->link;

        //upload logo - partenaire
         if (request()->has('logo')) {            
            $partner = request()->file('logo');
            $partnerName = time() . '.' . $partner->getClientOriginalExtension();
            $partnerPath = public_path('/images/partenaires/');
            $partner->move($partnerPath, $partnerName);
            $thepartner->logo = "/images/partenaires/" . $partnerName;
        }

        $thepartner->save();
        
        session()->flash('success','Partenaire ajouté avec succée!');

        return redirect()->back();
    }


    public function destroy(Request $request,$id){
        $partner = Partner::find($id);

        $partner->delete();

        session()->flash('success','Partenaire supprimé avec succée !');

        return redirect()->back();
    }
}
