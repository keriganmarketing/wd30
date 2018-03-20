<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapModuleController extends Controller
{
    public function show()
    {
        return response()->json(config('modules.map_search'));
    }
}
