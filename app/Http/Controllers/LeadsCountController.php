<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class LeadsCountController extends Controller
{
    public function show()
    {
        return Lead::active()->count();
    }
}
