<?php

namespace App\Http\Controllers;

use App\Lead;
use App\User;
use App\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Facades\KeriganSolutions\Drone\Mothership;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $user = Auth::user();
        $avatarPath = Avatar::where('user_id', 1)
                            ->exists() ? '/storage/' . Avatar::first()->path
                            : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png';

        return view('home', compact('user', 'avatarPath'));
    }

    /**
     * Show listings with analytics.
     *
     * @return string
     */
    public function myProperties()
    {
        $user = User::realtor();

        return Mothership::agentListingsWithAnalytics($user->mls_id);
    }
}
