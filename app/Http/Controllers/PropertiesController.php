<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\KeriganSolutions\Drone\Mothership;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Mothership::search($request->all());
        return view('properties.index', compact('properties'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('properties.show');
    }

}
