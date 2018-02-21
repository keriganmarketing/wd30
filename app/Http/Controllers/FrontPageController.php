<?php

namespace App\Http\Controllers;

use SEOMeta;
use App\User;
use App\Content;
use Illuminate\Http\Request;
use Facades\KeriganSolutions\Drone\Mothership;
use App\MetaData;

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
        $meta = MetaData::first();
        SEOMeta::setTitle($meta->title);
        SEOMeta::setDescription($meta->description);

        $realtor = User::where('is_realtor', 1)->exists() ? User::realtor() : null;
        $content = Content::first();
        if ($realtor) {
            $realtor->listings = Mothership::agentListings($realtor->mls_id);
        }

        return view('StaticPages.front', compact('realtor', 'content'));
    }
}
