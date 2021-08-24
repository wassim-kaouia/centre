<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller
{
    public function edit(Request $request){

        $data = Setting::latest()->get();
        return view('settings.edit',['setting' => $data]);
    }

    public function update(Request $request){
        $setting = Setting::first();
        
        $setting->title       = $request->title;
        $setting->subtitle    = $request->subtitle;
        $setting->phone       = $request->phone;
        $setting->about       = $request->about;
        $setting->address     = $request->address;
        $setting->email       = $request->email;
        $setting->twitter     = $request->twitter;
        $setting->instagram   = $request->instagram;
        $setting->youtube     = $request->youtube;
        $setting->pinterest   = $request->pinterest;
        $setting->linkedin    = $request->linkedin;
        $setting->facebook    = $request->facebook;

        $bloc1 = collect([
            'title'       => $request->leftbloc,
            'description' => $request->desleftbloc,
        ])->toJson();

        $bloc2 = collect([
            'title'       => $request->centrebloc,
            'description' => $request->descentrebloc,
        ])->toJson();
        
        $bloc3 = collect([
            'title'       => $request->rightbloc,
            'description' => $request->desrightbloc,
        ])->toJson();

        $setting->bloc1 = $bloc1;
        $setting->bloc2 = $bloc2;
        $setting->bloc3 = $bloc3;

        $setting->save();

        dd('ok');
    }
}
