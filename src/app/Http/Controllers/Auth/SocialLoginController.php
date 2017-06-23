<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Cookie;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SocialLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }


    // Facebook
    public function facebookRedirect(Request $request)
    {
        return Socialite::driver('facebook')->redirect();

    }

    public function facebookCallback(Request $request)
    {


        $serviceUser = Socialite::driver('facebook')->user();

        $user = $this->getExistingUser($serviceUser);

        if(!$user){
            $name = explode(' ', $serviceUser->getName());

            $user = User::create([
                "firstname" => $name[0],
                "lastname" => isset($name[1]) ? $name[1]: '',
                "email" => $serviceUser->getEmail(),
                "verified" => true,
                "activated" => true,
            ]);

            $user->save();
            alert()->success('Welcome, You have Successfully registered');

        }

        Auth::login($user, false);
        if($this->logoutIfNotActive($user)){
            return redirect('/error');
        }


        return redirect()->intended()->withCookie( Cookie::forever('lang', $user->lang) );
    }

    // Google

    public function googleRedirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request)
    {
        $serviceUser = Socialite::driver('google')->user();

        $user = $this->getExistingUser($serviceUser);

        if(!$user){
            $name = explode(' ', $serviceUser->getName());

            $user = User::create([
                "firstname" => $name[0],
                "lastname" => isset($name[1]) ? $name[1]: '',
                "email" => $serviceUser->getEmail(),
                "verified" => true,
                "activated" => true,
            ]);

            $user->save();
            alert()->success('Welcome, You have Successfully registered');

        }

        Auth::login($user, false);

        if($this->logoutIfNotActive($user)){
            return redirect('/error');
        }

        return redirect()->intended()->withCookie( Cookie::forever('lang', $user->lang) );
    }

    // Twitter

    public function twitterRedirect(Request $request)
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallback(Request $request)
    {
        $serviceUser = Socialite::driver('twitter')->user();

        $user = $this->getExistingUser($serviceUser);

        if(!$user){
            $name = explode(' ', $serviceUser->getName());

            $user = User::create([
                "firstname" => $name[0],
                "lastname" => isset($name[1]) ? $name[1]: '',
                "email" => $serviceUser->getEmail(),
                "verified" => true,
                "activated" => true,
            ]);

            $user->save();
            alert()->success('Welcome, You have Successfully registered');

        }

        Auth::login($user, false);

        if($this->logoutIfNotActive($user)){
            return redirect('/error');
        }

        return redirect()->intended()->withCookie( Cookie::forever('lang', $user->lang) );
    }



    protected function getExistingUser($serviceUser)
    {
        return User::where('email', $serviceUser->getEmail())->first();
    }

    protected function logoutIfNotActive(User $user)
    {
        if(!$user->activated){
            Auth::logout();
            return true;
        }

        return false;
    }

    

}
