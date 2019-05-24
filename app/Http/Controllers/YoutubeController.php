<?php

namespace App\Http\Controllers;

use Youtube;
use App\User;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realtor = User::realtor();
        return response()->json(Youtube::listChannelVideos($realtor->youtube_channel_id, 3, "date"));
    }

}
