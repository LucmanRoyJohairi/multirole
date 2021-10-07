<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        //customer role
        if(Auth::user()->role_id == 2){
            return $next($request);
        }

        //admin role
        if(Auth::user()->role_id == 1){
            return $redirect()->route('admin');
        }
    }
}
