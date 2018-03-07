<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function redirectToProvider()
    {
        session(['redirect' => 'foo']);
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        dd($user);
    }
}

