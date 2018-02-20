<?php

namespace App\Http\Controllers;

use App\User;
use App\Installer;
use Illuminate\Http\Request;
use Facades\KeriganSolutions\Drone\Mothership;

class InstallController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('install');
    }

    /**
     * Configure the initial install parameters and prepare for completion
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function configure(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|unique:users|email|max:255',
            'company'  => 'required|max:255',
            'password' => 'min:6|confirmed'
        ]);

        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'company'    => $request->company,
            'is_realtor' => 1,
            'password'   => bcrypt($request->password)
        ]);

        $email = urlencode($request->email);
        $agentData = (new Installer())->configure(Mothership::agentData($email));

        return response()->json($agentData);
    }

    /**
     * Complete the install process
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        //
    }

}
