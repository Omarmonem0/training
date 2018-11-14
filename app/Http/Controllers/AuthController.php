<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Socialite;

class AuthController extends Controller
{
    //
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $SocialUser = Socialite::driver('facebook')->user();
        $findUser = User::where('email',$SocialUser->email)->first();
        if ($findUser){
            Auth::login($findUser);
            return redirect('home');
        }
       else {
           $PhoneNumber = '011234';
           $PhoneNumber = $PhoneNumber . strval(rand(11111,99999));

           $user = User::create([
               'name' => $SocialUser->name,
               'email' => $SocialUser->email,
               'phone' => $PhoneNumber,
               'password' => bcrypt('123456789')
           ]);
           Auth::login($user);
           return redirect('home');
       }

    }

}
