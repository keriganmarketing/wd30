<?php

namespace App\Http\Controllers;

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
        return \Auth::user();
    }
}
