<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Policy;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function edit(Request $request)
    {

        $data = Setting::latest()->get();
        return view('settings.edit', ['setting' => $data]);
    }

    public function update(Request $request)
    {
        // dd($request->phone);
        $setting = Setting::first();

        $setting->title = $request->title;
        $setting->subtitle = $request->subtitle;
        $setting->phone = $request->phone;
        $setting->about = $request->about;
        $setting->address = $request->address;
        $setting->email = $request->email;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        $setting->pinterest = $request->pinterest;
        $setting->linkedin = $request->linkedin;
        $setting->facebook = $request->facebook;

        $bloc1 = collect([
            'title' => $request->leftbloc,
            'description' => $request->desleftbloc,
        ])->toJson();

        $bloc2 = collect([
            'title' => $request->centrebloc,
            'description' => $request->descentrebloc,
        ])->toJson();

        $bloc3 = collect([
            'title' => $request->rightbloc,
            'description' => $request->desrightbloc,
        ])->toJson();

        $setting->bloc1 = $bloc1;
        $setting->bloc2 = $bloc2;
        $setting->bloc3 = $bloc3;

        //upload logo
        if (request()->has('logo')) {
            //delete od one
            $logo_path = public_path($setting->logo);
            if (File::exists($logo_path)) {
                File::delete($logo_path);
            }

            $logo = request()->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logoPath = public_path('/images/logo/');
            $logo->move($logoPath, $logoName);
            $setting->logo = "/images/logo/" . $logoName;
        }

        $setting->save();

        session()->flash('success', 'Mise ?? jour r??ussie !');

        return redirect()->back();
    }

    public function show_conditions_page()
    {
        $conditions = Condition::exists() ? Condition::first() : null;
        return view('settings.conditions', ['conditions' => $conditions]);
    }

    public function show_politiques_page()
    {
        $policies = Policy::exists() ? Policy::first() : null;
        return view('settings.politiques', ['policies' => $policies]);
    }

    public function conditions(Request $request)
    {

        $content = new Condition();
        $content->conditions = $request->content;
        $content->save();

        session()->flash('success', 'Page des Conditions est bien Cr??e');
        return redirect()->back();
    }

    public function conditions_update(Request $request)
    {
        $content = Condition::first();
        $content->conditions = $request->content;
        $content->save();

        session()->flash('success', 'Page de Conditions est bien Mise ?? jour !');
        return redirect()->back();
    }

    public function politiques(Request $request)
    {

        $content = new Policy();
        $content->policy = $request->content;
        $content->save();

        session()->flash('success', 'Page de politiques est bien Cr??e');
        return redirect()->back();
    }

    public function politiques_update(Request $request)
    {

        $content = Policy::first();
        $content->policy = $request->content;
        $content->save();

        session()->flash('success', 'Page de Politiques est bien Mise ?? jour !');
        return redirect()->back();
    }
}
