<?php

namespace App\Providers;

use App\Models\Course;
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
    }
}
