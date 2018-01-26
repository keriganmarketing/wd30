<?php

namespace App\Http\Controllers;

use App\FeaturedProperty;
use Illuminate\Http\Request;

class FeaturedPropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FeaturedProperty::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FeaturedProperty::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FeaturedProperty  $featuredProperty
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturedProperty $featuredProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeaturedProperty  $featuredProperty
     * @return \Illuminate\Http\Response
     */
    public function edit(FeaturedProperty $featuredProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeaturedProperty  $featuredProperty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeaturedProperty $featuredProperty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fp = FeaturedProperty::find($id);
        $fp->delete();
    }
}
