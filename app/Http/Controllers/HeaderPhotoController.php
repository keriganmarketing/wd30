<?php

namespace App\Http\Controllers;

use App\User;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'http://via.placeholder.com/1920x750';
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $this->validate(request(), [
            'header_photo' => 'required|image'
        ]);

        $content = Content::first();

        if (Storage::disk('public')->exists($content->header_photo_path)) {
            Storage::disk('public')->delete($content->header_photo_path);
        }
        $content->update([
            'header_photo_path' => request()->file('header_photo')->store('/header_photo', 'public')
        ]);

        $headerPhotoPath = Content::first()->header_photo_path;

        return asset('storage/'. $headerPhotoPath);
    }
}
