<?php

namespace App;

use App\Lead;
use App\User;
use App\Content;
use App\Installer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Installer
{
    public function configure($agent)
    {
        $formatted = [];
        foreach ($agent as $key => $value) {
            if ($key != 'mls_id' && $key != 'photos') {
                $formatted[$key] = $this->clean($value);
            }
        }
        $formatted['mls_id'] = array_filter($agent->mls_id);
        $formatted['photos'] = array_filter($agent->photos);

        return $formatted;
    }

    protected function clean($array)
    {
        $clean = [];
        foreach (array_filter(array_unique($array)) as $field) {
            $clean[] = ucwords(strtolower(preg_replace('/[^a-z\d \( \) \- ]+/i', '', $field)));
        }

        return array_unique($clean);
    }

    public function install(Request $request)
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
