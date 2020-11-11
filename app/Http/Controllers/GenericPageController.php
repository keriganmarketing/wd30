<?php

namespace App\Http\Controllers;

use App\Realtor;
use App\Content;
use Illuminate\Http\Request;

class GenericPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accessibility(Request $request)
    {
        $realtor     = (new Realtor())->getProfile();
        $content     = Content::first();
        $headerPhoto = ($content->header_photo_path != null && $content->header_photo_path != '') ? asset('/storage/' . $content->header_photo_path) : asset('/img/default-header.jpg');

        return view('StaticPages.accessibility', compact('realtor', 'content', 'headerPhoto'));
    }

}
