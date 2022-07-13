<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User ;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // socialite  => google and github 

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
      
    }


    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();


        $fined_user =  User::where('email' , $user->getEmail())->first();

        if($fined_user){
            Auth::login($fined_user) ;
            return redirect('/');
        }else{
            $user_new = new User ;
            $user_new ->email =   $user->getName();
            $user_new ->name = $user->getName();
            $user_new ->password = bcrypt(12345678);
            if($user_new->save()){
                Auth::login($user_new);
                return redirect('/');
            }
        }
        return redirect('/');
    }

}

