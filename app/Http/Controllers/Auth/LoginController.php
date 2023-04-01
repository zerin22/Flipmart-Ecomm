<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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

    protected function redirectTo(){
        if(Auth()->user()->role_id == 1){
            return route('admin.dashboard');
        }elseif(Auth()->user()->role_id == 2){
            return route('user.dashboard');
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $this->registrationOrLogin($user);
        return redirect()->route('user.dashboard');
    }

    public function loginWithGithub(){
         return Socialite::driver('github')->redirect();
    }
    public function loginWithGithubCallback(){
          $user = Socialite::driver('github')->user();
          $this->registrationOrLogin($user);
          return redirect()->route('user.dashboard');
    }

    public function registrationOrLogin($data){
         $user = User::where('email', $data->email)->first();
         if(!$user){
             $user = new User();
             $user->name = $data->name;
             $user->email = $data->email;
             $user->provider_id = $data->id;
             $user->image = $data->avatar;
             $user->save();
         }
         Auth::login($user);

    }


}
