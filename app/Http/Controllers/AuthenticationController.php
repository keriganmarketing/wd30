<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    /**
     * Return whether the current user is authenticated.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return \Auth::user();
    }

}
