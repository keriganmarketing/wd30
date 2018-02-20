<?php

namespace App\Http\Controllers;

use App\User;
use Facades\App\OpenHouse;
use Facades\App\Feature;
use Illuminate\Http\Request;
use Facades\KeriganSolutions\Drone\Mothership;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class PropertySearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $realtor    = User::where('is_realtor', 1)->exists() ? User::realtor() : null;
        $properties = Mothership::search($request);

        return view('properties.index', compact('properties', 'realtor'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($mlsNumber)
    {
        $property   = Mothership::listing($mlsNumber);
        $features   = Feature::list($property);
        $openHouses = OpenHouse::extract($property->open_houses);
        $realtor    = User::where('is_realtor', 1)->exists() ? User::realtor() : null;

        return view('properties.show', compact('property', 'features', 'openHouses', 'realtor'));
    }

}
