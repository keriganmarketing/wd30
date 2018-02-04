<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                            ->exists() ? Avatar::first()->path
                            : 'https://media1.popsugar-assets.com/files/thumbor/l3tGpIatkHybxJGKNsK1BDe_WJs/fit-in/1024x1024/filters:format_auto-!!-:strip_icc-!!-/2014/08/08/878/n/1922507/9ed5cdef48c5ef69_thumb_temp_image32304521407524949/i/Funny-Cat-GIFs.jpg';

        return view('home', compact('user', 'avatarPath'));
    }

    public function myProperties()
    {
        return view('my-properties');
    }
}
