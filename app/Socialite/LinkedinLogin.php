<?php

namespace App\Socialite;

use App\Models\Admin;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LinkedinLogin implements ISocialite 
{
    public function login(){
        $socialUser = Socialite::with('linkedin')->stateless()->user();
        dd($socialUser);
        $url = $socialUser->getAvatar();
        $imagePath = time().'-'.$socialUser->getNickName().'.jpg';
        

        $savedUser = Admin::where('provider_id','=',$socialUser->getId())->first();

        $AUTHENTICATABLE_USER = null;
        if($savedUser){ //exist
            
            // in case he changed his picture
            unlink(public_path('images\profile\\'.$savedUser->image->path));
            file_put_contents(public_path('images/profile/'.$imagePath),file_get_contents($url));
            $image = Image::where('imageable_id',$savedUser->id)->first();
            $image->update([
                'path'  => $imagePath,
            ]);
            $AUTHENTICATABLE_USER = $savedUser;
        } else {
            $newUser = DB::transaction(function() use($socialUser,$imagePath,$url){
                $newUser = Admin::create([
                    'name'      => $socialUser->getNickName(),
                    'email'     => $socialUser->getEmail(),
                    'password'  => Hash::make($socialUser->getName().'@'.$socialUser->getId()),
                    'provider_id'   => $socialUser->getId(),
                ]);

                Image::create([
                    'imageable_id'      => $newUser->id,
                    'path'              => $imagePath,
                    'imageable_type'    => 'App\Models\Admin',
                ]);
                file_put_contents(public_path('images/profile/'.$imagePath),file_get_contents($url));
                return $newUser;
            });
            $AUTHENTICATABLE_USER = $newUser;
        }

        return $AUTHENTICATABLE_USER;
    }
}