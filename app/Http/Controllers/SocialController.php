<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    public function redirect($service){
        return Socialite::driver($service)->stateless()->redirect();
    }

    public function callback($service){
        $user = Socialite::with($service)->stateless()->user();
         // user->getId();
        $saveUser = User::UpdateOrCreate([
            'facebook_id' => $user->getId(),
        ],[
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => Hash::make($user->getName().'@'.$user->getId())
        ]);

        Auth::loginUsingId($saveUser->id);

        return redirect('/home');
    }
}
