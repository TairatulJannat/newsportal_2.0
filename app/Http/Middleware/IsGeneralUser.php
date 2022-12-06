<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class IsGeneralUser
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
        $user = User::where('email', $request->email)->first();
        //  dd($user);
       
        if (isset($user)) {
            if($request->email == $user->email && Hash::check($request->password ,$user->password)   && $user->type == 'general_user'){
                return $next($request);
            }   
            else{
                $notification = array(
                    'message' => 'Login Failed!',
                    'alert-type' => 'warning'
                );
                return redirect()->route('frontend.home')->with($notification);
            }
        }
        else{
            
            $notification = array(
                'success' => 'Login Failed !',
            );
            return redirect()->route('frontend.home')->with($notification);
        }
       
        // dd(Hash::make(12345678));
        // return $next($request);
    }
}
