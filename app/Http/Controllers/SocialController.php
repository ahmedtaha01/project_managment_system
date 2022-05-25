<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class SocialController extends Controller
{
    public function redirect($service){
        return Socialite::driver($service)->redirect();
    }

    public function callback($service,Request $request){

        $user = Socialite::with($service)->stateless()->user();
        $name = $this->getNameFromCallBack($user,$service);
        
        // for the image
        $url = $user->getAvatar();
        $imageName = time().'-'.$name.'.jpg';
        $path = 'C:\wamp64\www\projectsManagmentSystem\public\images\profile\\'.$imageName;
        file_put_contents($path,file_get_contents($url));
        ////
        $saveUser = User::where('provider_id','=',$user->getId())->first();
        if($saveUser){
            //update
            unlink(public_path('images/profile/'.$saveUser->image));
            $saveUser = tap(DB::table('users')->where('provider_id','=',$user->getId()))
                            ->update([
                                'name'      => $name,
                                'email'     => $user->getEmail(),
                                'password'  => Hash::make($name.'@'.$user->getId()),
                                'image'     => $imageName,
                            ])->first();
        } else {
            dd($saveUser);
            $saveUser = User::create([
                'name'      => $name,
                'email'     => $user->getEmail(),
                'password'  => Hash::make($name.'@'.$user->getId()),
                'image'     => $imageName,
                'provider_id'   => $user->getId(),
            ]);
        }

        // $saveUser = User::UpdateOrCreate([
        //     'provider_id' => $user->getId(),
        // ],[
        //     'name'      => $name,
        //     'email'     => $user->getEmail(),
        //     'password'  => Hash::make($name.'@'.$user->getId()),
        //     'image'     => $imageName,
        // ]);

        Auth::loginUsingId($saveUser->id);

        return redirect('/home');
    }

    private function getNameFromCallBack($user, $service){
        switch($service){
            case 'facebook':
                return $user->getName();
              break;
            case 'github':
                return $user->getNickName();
              break;
            case 'google':
                return $user->getName();
              break;          
        }
    }
    
}
