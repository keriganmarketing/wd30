<?php

namespace App\Http\Controllers;

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
        $content = Content::first();
        $fbPosts = FacebookFeed::fetch(3);

        return view('StaticPages.front', compact('realtor', 'content', 'fbPosts'));
    }
}
