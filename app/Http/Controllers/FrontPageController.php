<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use KeriganSolutions\Drone\Mothership;

class FrontPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mlsId = User::where('is_realtor', true)->first()->mls_id;
        $listings = collect((new Mothership())->agentListings($mlsId));

        return view('StaticPages.front', compact('listings'));
    }
}
