<?php

namespace App\Http\Controllers;

use App\User;
use App\Content;
use App\Realtor;
use Facades\App\MetaData;
use Illuminate\Http\Request;
use Facades\KeriganSolutions\Drone\Mothership;

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

        $realtor = (new Realtor())->getProfile()->withListings()->andAvatar();
        $content = Content::first();

        return view('StaticPages.front', compact('realtor', 'content'));
    }
}
