<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if(!Auth::check()){
            // dd(Auth::user());
        }
        $user = User::where('email', $request->email)->first();
        if(isset($user)){
            if($user->type == 'reporter' || $user->type == 'editor' || $user->type == 'admin' || $user->type == 'super_admin' || $user->type == 'sub_editor' )
            {
                $this->middleware('guest')->except('logout');
            }
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('user/login');
      }


    public function authenticateGeneralUser(Request $request){

        $user = User::where('email', $request->email)->first();
        // dd($user);
        $request->session()->put('user', $user);

        $notification = array(
            'message' => 'Login Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function GeneralUserLogout(Request $request){

        $request->session()->forget('user');
        $notification = array(
            'message' => 'Logout Successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }


    public function redirectToGoogle(){

        try{

            session(['link' => url()->previous()]);

            return Socialite::driver('google')->redirect();

        }catch(Exception $e){

            return abort('500');

        }

    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                return redirect(session('link'));

            }else{

                $user_new = new User();

                $user_new->name_en = $user->name;
                $user_new->name_bn = $user->name;
                $user_new->email = $user->email;
                $user_new->google_id = $user->id;
                $user_new->password = encrypt('123456');

                $user_new->save();

                return redirect(session('link'));;
            }

        } catch (Exception $e) {

            dd($e->getMessage());

        }
    }

    public function redirectToFacebook(){

        try{

            session(['link' => url()->previous()]);

            return Socialite::driver('facebook')->redirect();

        }catch(Exception $e){

            dd($e->getMessage());

        }
    }

    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->stateless()->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if($finduser){

                return redirect(session('link'));

            }else{

                if(User::where('email', '=', '$user->email')){

                    return redirect(session('link'));

                }else{

                    $user_new = new User();

                    $user_new->name_en = $user->name;
                    $user_new->name_bn = $user->name;
                    $user_new->email = $user->email;
                    $user_new->google_id = $user->id;
                    $user_new->password = encrypt('123456');

                    $user_new->save();

                    return redirect(session('link'));
                }

            }

        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}
