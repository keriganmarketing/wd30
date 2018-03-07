<?php

namespace App\Http\Controllers;

use App\User;
use App\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Avatar::where('user_id', 1)->exists()) {
            return '/storage/' . Avatar::first()->path;
        }

        return 'http://via.placeholder.com/300x300';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'avatar' => 'required|image'
        ]);

        if (Storage::disk('public')->exists(auth()->user()->avatar_path)) {
            Storage::delete(auth()->user()->avatar_path);
        }
        auth()->user()->update([
            'avatar_path' => request()->file('avatar')->store('/avatar', 'public')
        ]);

        return asset('storage/'. auth()->user()->avatar_path);
    }
}
