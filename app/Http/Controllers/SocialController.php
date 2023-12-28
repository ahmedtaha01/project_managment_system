<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class SocialController extends Controller
{
    public function redirect($service){
    
        return Socialite::driver($service)->redirect();
    }

    public function callback($service){

        $callback = 'App\Socialite\\'.$service.'Login';

        Auth::guard('admin')->login((new $callback)->login());

        return redirect()->route('dashboard');
    }

}
