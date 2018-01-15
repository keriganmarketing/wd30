<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Note;

class LeadNotesController extends Controller
{
    public function index(Lead $lead)
    {
        return Note::forLead($lead->id);
    }
}
