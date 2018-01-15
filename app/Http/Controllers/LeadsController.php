<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::where('active', 1)->latest()->paginate(5);
        foreach ($leads as $lead) {
            $lead->diff = Carbon::parse($lead->created_at)->diffForHumans();
        }

        return $leads;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lead::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $lead->update([
            'name'      => $request->name ?? $lead->name,
            'email'     => $request->email ?? $lead->email,
            'phone'     => $request->phone ?? $lead->phone,
            'message'   => $request->message ?? $lead->message,
            'active'    => $request->active ?? $lead->active,
            'important' => $request->important ?? $lead->important
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
