<?php

namespace App\Http\Controllers;

use App\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArchivedLeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::where('active', 0)->orderBy('updated_at', 'DESC')->paginate(5);

        foreach ($leads as $lead) {
            $lead->diff = Carbon::parse($lead->created_at)->diffForHumans();
        }

        return response()->json($leads);
    }
}
