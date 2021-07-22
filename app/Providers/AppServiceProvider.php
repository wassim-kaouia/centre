<?php

namespace App\Providers;

use App\Models\Fees;
use App\Models\Course;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot()
    {
        $pending = Course::where('status','=',false)->get();
        view()->share('pending', $pending);

        $categories = Category::all();
        view()->share('categories', $categories);


        $students = Student::all();
        view()->share('students', $students);

        $feeelement = Fees::first()->get();
        $fee = Fees::findOrFail($feeelement[0]->id);
        view()->share('fees',$fee);

    }
}
