<?php

namespace App\Http\Controllers;

use App\Lead;
use App\User;
use Carbon\Carbon;
use App\Mail\LeadCreated;
use App\Mail\LeadReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $important = $request->important === 'true';
        return Lead::active()->when($important, function ($query) {
            return $query->where('important', 1);
        })->latest()->paginate(5);
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
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:190',
            'phone'   => 'required|max:15',
            'message' => 'required'
        ]);

        $realtor = User::realtor();
        $lead = Lead::create($request->all());

        Mail::to($request->email)->send(new LeadCreated($lead));
        Mail::to($realtor->email)->send(new LeadReceived($lead));

        return $lead;
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
        $lead->update($request->all());
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
