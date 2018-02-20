<?php

namespace App\Http\Controllers;

use App\User;
use App\Installer;
use Illuminate\Http\Request;
use Facades\KeriganSolutions\Drone\Mothership;
use App\Lead;
use App\Content;
use Illuminate\Support\Facades\Storage;

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
        $this->updateRealtorInfo($request);
        $this->firstLead();
        $this->boilerplateContent();
        Storage::put('installed', '');
    }

    protected function updateRealtorInfo($request)
    {
        $mlsString = $request->has('mls_id') ? implode('|', $request->mls_id) : '';
        $cell_phone = $request->has('cell_phone') ? $request->cell_phone : '';
        $office_phone = $request->has('office_phone') ? $request->office_phone : '';
        $photo = $request->has('photo') && $request->photo[0]['url'] ? $request->photo[0]['url'] : '';
        $address = $this->buildAddress($request);
        $user = User::first();

        $user->update([
            'mls_id' => $mlsString,
            'cell_phone' => $cell_phone,
            'office_phone' => $office_phone,
            'primary_phone' => $cell_phone,
            'default_photo' => $photo,
            'is_realtor' => true,
            'address' => $address
        ]);
    }
    protected function buildAddress(Request $request)
    {
        $street_1 = $request->has('street_1') ? $request->street_1 : '';
        $street_2 = $request->has('street_2') ? $request->street_2 : '';
        $city = $request->has('city') ? $request->city : '';
        $state = $request->has('state') ? $request->state : '';
        $zip = $request->has('zip') ? $request->zip : '';
        $address = '';

        $address .= $street_1 . PHP_EOL;
        if ($street_2 != '') {
            $address .= $street_2 . PHP_EOL;
        }
        $address .= $city . ', ' . strtoupper($state) . ' ' . $zip;

        return $address;
    }

    protected function firstLead()
    {
        Lead::create([
            'name' => 'Kerigan Marketing Associates',
            'email' => 'web@kerigan.com',
            'phone' => '(850) 648-4560',
            'message' => 'Thanks for choosing KMA! We think this is the beginning of a beautiful relationship. Let us know if there\'s anything we can do for you!'
        ]);
    }
    protected function boilerplateContent()
    {
        $user = User::realtor();
        Content::create([
            'title' => $user->name . ', Realtor',
            'body' => 'Use this area to tell the world why they should conduct their real estate business with you'
        ]);
    }

}
