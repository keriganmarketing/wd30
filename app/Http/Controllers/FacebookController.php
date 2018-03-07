<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\User;

class FacebookController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $realtor = auth()->user();
        dd($realtor);

        $realtor->update([
            'fb_access_token' => $user->token
        ]);

        return view('callbacks.success');
    }
}

