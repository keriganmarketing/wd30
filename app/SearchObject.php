<?php

namespace App;

class SearchObject
{
    public $omni;
    public $propertyType;
    public $minPrice;
    public $maxPrice;
    public $bedrooms;
    public $bathrooms;
    public $sq_ft;
    public $acreage;
    public $waterfront;
    public $pool;
    public $page;
    public $sortBy;
    public $orderBy;
    public $status;

    /**
     * Constructor
     */
    public function __construct($params)
    {
        $this->convertParams($params);
    }

    /*
    * If multiple statuses are selected, create a string from the indexes.
    * Otherwise, just use the specified status or just default to "Active".
    */
    protected function stringify($array)
    {
        if (is_array($array))
        {
            return implode('|', $array);
        }

        return $array;
    }

    /**
     * Convert the statuses into strings.
     *
     * @param
     * @return string
     */
    protected function convertParams($params)
    {
        foreach ($params as $key => $value) {
            $this->$key = $this->stringify($value);
        }

        return $this;
    }

    /**
     * Convert search query into a string.
     *
     * @return string
     */
    protected function toQueryString($view)
    {
        $pt = $this->propertyType;
        if ($pt != null){
            $this->propertyType = $this->stringify($this->getPropertyTypes($pt));
        }
        $terms = get_object_vars($this);
        $sq = $view == 'grid' ? 'search?' : 'allMapListings?';
        $iterator = 0;
        foreach ($terms as $key => $value) {
            if ($iterator > 0 ) {
                $sq .= '&';
                $sq .= $key .'=' . $value;
            }
            if ($key == 'omni') {
                $sq .= 'city=' . $this->$key;
            }

            ++$iterator;
        }

        return $sq;
    }

    /**
     * Group similar property types togther to improve searching.
     *
     * @return array
     */
    private function getPropertyTypes($class = null)
    {
        $typeArray = [
            'Single Family Home'   => ['Detached Single Family'],
            'Condo / Townhome'     => ['Condominium', 'Townhouse', 'Townhomes'],
            'Commercial'           => ['Office', 'Retail', 'Industrial', 'Income Producing', 'Unimproved Commercial', 'Business Only', 'Auto Repair', 'Improved Commercial', 'Hotel/Motel'],
            'Lots / Land'          => ['Vacant Land', 'Residential Lots', 'Land', 'Land/Acres', 'Lots/Land'],
            'Multi-Family Home'    => ['Duplex Multi-Units', 'Triplex Multi-Units'],
            'Rental'               => ['Apartment', 'House', 'Duplex', 'Triplex', 'Quadruplex', 'Apartments/Multi-family'],
            'Manufactured'         => ['Mobile Home', 'Mobile/Manufactured'],
            'Farms / Agricultural' => ['Farm', 'Agricultural', 'Farm/Ranch', 'Farm/Timberland'],
            'Other'                => ['Attached Single Unit', 'Attached Single Family', 'Dock/Wet Slip', 'Dry Storage', 'Mobile/Trailer Park', 'Mobile Home Park', 'Residential Income', 'Parking Space', 'RV/Mobile Park']
        ];

        if ($class != null) {
            return $typeArray[$class];
        }

        return $typeArray;
    }

}
