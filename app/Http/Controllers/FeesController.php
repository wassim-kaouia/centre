<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class FeesController extends Controller
{

   
    public function create(){
        $fees = Fees::all();
        return view('fees.create',['fees' => $fees]);
    }   

    public function update(Request $request){

        $request->validate([
            'subscribing_fees' => 'required|numeric',
            'dossier_fees'     => 'required|numeric',
        ],[
            'subscribing_fees.required' => "L'inscription doit être un entier",
            'dossier_fees.required'    => "Les frais de dossier doit être un entier",
        ]);

        $subscription = $request->subscribing_fees;
        $dossier      = $request->dossier_fees;

        $feeelement = Fees::first()->get();

        $fee = Fees::findOrFail($feeelement[0]->id);

        $fee->inscription = $subscription;
        $fee->dossier     = $dossier;

        $fee->save();

        Toastr::success('Les frais sont enregistrés avec succée');
        return redirect()->back();

    }


}
