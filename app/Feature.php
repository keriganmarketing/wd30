<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function list($property)
    {
        $exterior        = $this->hasData($property->exterior) ? $this->arrayify($property->exterior):               null;
        $interior        = $this->hasData($property->interior) ? $this->arrayify($property->interior):               null;
        $amenities       = $this->hasData($property->amenities) ? $this->arrayify($property->amenities):             null;
        $utilities       = $this->hasData($property->utilities) ? $this->arrayify($property->utilities):             null;
        $appliances      = $this->hasData($property->appliances) ? $this->arrayify($property->appliances):           null;
        $construction    = $this->hasData($property->construction) ? $this->arrayify($property->construction):       null;
        $energy_features = $this->hasData($property->energy_features) ? $this->arrayify($property->energy_features): null;

        $raw = [
            'Exterior'        => $exterior,
            'Interior'        => $interior,
            'Amenities'       => $amenities,
            'Utilities'       => $utilities,
            'Appliances'      => $appliances,
            'Construction'    => $construction,
            'Energy Features' => $energy_features,
        ];

        // Remove empty values to make looping easier
        $features = array_filter($raw);

        return $features;
    }

    protected function hasData($value)
    {
       return (isset($value) && $value != '');
    }

    protected function arrayify($value)
    {
        return explode(',', $value);
    }
}
