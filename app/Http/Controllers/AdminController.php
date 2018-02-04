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
        $avatarPath = Avatar::where('user_id', 1)->exists() ? Avatar::first()->path : null;

        return view('home', compact('user', 'avatarPath'));
    }

    public function myProperties()
    {
        return view('my-properties');
    }
}
