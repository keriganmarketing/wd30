<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Note;
use Illuminate\Http\Request;

class LeadNotesController extends Controller
{
    /**
     * Return the notes for the given lead.
     *
     * @param Lead $lead
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Lead $lead)
    {
        return Note::forLead($lead->id)->get();
    }
}
