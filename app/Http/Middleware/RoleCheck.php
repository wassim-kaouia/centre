<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role->role == 'Admin' || Auth::user()->role->role == 'Secretariat'){
            return $next($request);
        }else{
            return redirect()->back();
        }   
    }
}
