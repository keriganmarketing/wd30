<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function fullAddress($property)
    {
        $address = $property->full_address ?? $this->buildAddress($property);

        return $address;
    }

    protected function buildAddress($property)
    {
        $address = $property->street_number . ' ' . $property->street_name . ' ' . $property->street_suffix;
        $address .= PHP_EOL;
        $address .= $property->city . ', ' . $property->state;

        return $address;
    }
}
