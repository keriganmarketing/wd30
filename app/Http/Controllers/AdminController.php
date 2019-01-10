<?php

namespace App\Http\Controllers;

use App\Lead;
use App\User;
use App\Avatar;
use App\Content;
use App\Realtor;
use App\MlsNumber;
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
        $user       = Auth::user();
        $avatarPath = $user->avatar_path != null ? asset('storage/'. $user->avatar_path): $user->default_photo;

        $content    = Content::first();
        $headerPhoto = ($content->header_photo_path != null && $content->header_photo_path != '') ? asset('/storage/' . $content->header_photo_path) : asset('/img/default-header.jpg');

        return view('home', compact('user', 'avatarPath', 'headerPhoto'));
    }

    /**
     * Show listings with analytics.
     *
     * @return string
     */
    public function myProperties()
    {
        return Mothership::agentListingsWithAnalytics(MlsNumber::toString());
    }
}
