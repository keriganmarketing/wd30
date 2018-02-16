<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class LeadsCountController extends Controller
{
    /**
     * Display the number of active leads.
     * 
     * @return int 
     */
    public function show()
    {
        return Lead::active()->count();
    }
}
