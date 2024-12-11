<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
        // Log::info('Client ID de Google: ' . config('services.google.client_id'));
        // Log::info('Secret de Google: ' . config('services.google.client_secret'));
        // Log::info('Redirect de Google: ' . config('services.google.redirect'));

 
        
        
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        
        $findUser = User::where('google_id', $user->id)->first();
        
        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('dashboard');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => encrypt('123')
            ]);
            Auth::login($newUser);
            return redirect()->route('dashboard');
        }


    
        // $this->_registerOrLoginUser($user);
        // return redirect()->route('dashboard');
    }
    // protected function _registerOrLoginUser($data)
    // {
    //     $user = User::where('email', '=', $data->email)->first();
    //     if (!$user) {
    //         $user = new User();
    //         $user->name = $data->name;
    //         $user->email = $data->email;
    //         $user->google_id = $data->id;
    //         $user->password = encrypt('123456dummy');
    //         $user->save();
    //     }
    //     Auth::login($user);
    // }
}
