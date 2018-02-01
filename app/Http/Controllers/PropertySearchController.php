<?php

namespace App\Http\Controllers;

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
        //dd($property);
        $interior = isset($property->interior) ? explode(',', $property->interior) : null;

        $exterior = isset($property->exterior) ? explode(',', $property->exterior) : null;

        $appliances = isset($property->appliances) ? explode(',', $property->appliances) : null;
       
        $construction = isset($property->construction) ? explode(',', $property->construction) : null;

        $utilities = isset($property->utilities) ? explode(',', $property->utilities) : null;

        $energy_features = isset($property->energy_features) ? explode(',', $property->energy_features) : null;

        $amenities = isset($property->amenities) ? explode(',', $property->amenities) : null;

        return view('properties.show', compact('property', 'interior', 'exterior', 'appliances', 'construction', 'utilities', 'energy_features', 'amenities'));
    }

}
