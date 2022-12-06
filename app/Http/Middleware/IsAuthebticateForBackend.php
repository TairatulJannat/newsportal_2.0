<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAuthebticateForBackend
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
        if(Auth::check()){
            if(Auth::user()->type == 'reporter' || Auth::user()->type == 'editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin' || Auth::user()->type == 'sub_editor' )
            {
                return $next($request);
            }
            else
            return redirect()->route('frontend.home');
            
        }
        return redirect()->route('login');
    }
}
