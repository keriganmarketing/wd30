<?php

namespace App\Http\Controllers;

use App\MlsNumber;
use Illuminate\Http\Request;

class MlsNumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MlsNumber::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'mls_id' => 'required|max:10'
        ]);

        $mlsNumber = MlsNumber::create($request->all());

        return $mlsNumber;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MlsNumber  $mlsNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(MlsNumber $mlsNumber)
    {
        $mlsNumber->delete();
    }
}
