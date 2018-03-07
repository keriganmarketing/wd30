<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use Illuminate\Http\Request;
use KeriganSolutions\FacebookFeed\FacebookFeed;

class FacebookController extends Controller
{
    public function index()
    {
        return response()->json(FacebookFeed::fetch(3));
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $realtor = auth()->user();

        $realtor->fb_access_token = $user->token;
        $realtor->save();

        return view('callbacks.success');
    }
}

