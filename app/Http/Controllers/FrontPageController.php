<?php

namespace App\Http\Controllers;

use Youtube;
use App\User;
use App\Content;
use App\Realtor;
use Facades\App\MetaData;
use Illuminate\Http\Request;
use Facades\KeriganSolutions\Drone\Mothership;
use KeriganSolutions\FacebookFeed\FacebookFeed;

class FrontPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('installed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        MetaData::generate();

        $realtor = (new Realtor())->getProfile()->withListings();
        $activeListings = [];
        $otherListings = [];
        array_map(function ($listing) use (&$activeListings, &$otherListings) {
           if ($listing->status == 'Active') {
               $activeListings[] = $listing;
           } else {
               $otherListings[] = $listing;
           }
        }, $realtor->listings);

        $content = Content::first();
        $headerPhoto = ($content->header_photo_path != null && $content->header_photo_path != '') ? asset('/storage/' . $content->header_photo_path) : asset('/img/default-header.jpg');
        $brokerLogo = ($content->broker_logo_path != null && $content->broker_logo_path != '') ? asset('/storage/' . Content::first()->broker_logo_path) : asset('/img/beachy-beach-logo.png');

        return view('StaticPages.front', compact('realtor', 'content', 'activeListings', 'otherListings', 'headerPhoto', 'brokerLogo'));
    }
}
