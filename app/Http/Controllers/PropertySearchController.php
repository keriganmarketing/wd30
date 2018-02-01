<?php

namespace App\Http\Controllers;

use Facades\App\Feature;
use Illuminate\Http\Request;
use Facades\KeriganSolutions\Drone\Mothership;

class PropertySearchController extends Controller
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
    public function show($mlsNumber)
    {
        $property = Mothership::listing($mlsNumber);
        $features = Feature::list($property);

        return view('properties.show', compact('property', 'featrty', 'features'));
    }

}
