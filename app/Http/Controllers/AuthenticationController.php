<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return User::realtor();
    }
}
