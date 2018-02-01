<?php
namespace KeriganSolutions\Drone;

use \GuzzleHttp\Client;

class Mothership
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://mothership.kerigan.com/api/v1/'
        ]);
    }

    public function search($params)
    {
        $omni         = $params['omniField'] ?? '';
        $propertyType = isset($params['propertyType']) && $params['propertyType'] != '' ? implode('|', $this->getPropertyTypes($params['propertyType'])): '';
        $minPrice     = $params['minPrice'] ?? '';
        $maxPrice     = $params['maxPrice'] ?? '';
        $bedrooms     = $params['bedrooms'] ?? '';
        $bathrooms    = $params['bathrooms'] ?? '';
        $sq_ft        = $params['sq_ft'] ?? '';
        $acreage      = $params['acreage'] ?? '';
        $waterfront   = $params['waterfront'] ?? '';
        $pool         = $params['pool'] ?? '';
        $page         = $params['pg'] ?? 1;
        $sortBy       = $params['sortBy'] ?? 'date_modified';
        $orderBy      = $params['orderBy'] ?? 'DESC';
        $status       = '';

        /*
         * If multiple statuses are selected, create a string from the indexes.
         * Otherwise, just use the specified status or just default to "Active".
         */
        if (isset($params['status'])) {
            if (is_array($params['status'])) {
                $status = implode('|', $params['status']);
            } else {
                $status = $params['status'];
            }
        }

        // make the API call
        $apiCall = $this->client->request(
            'GET',
            'search?'
                . 'city=' . $omni
                . '&propertyType=' . $propertyType
                . '&status=' . $status
                . '&minPrice=' . $minPrice
                . '&maxPrice=' . $maxPrice
                . '&bedrooms=' . $bedrooms
                . '&bathrooms=' . $bathrooms
                . '&sq_ft=' . $sq_ft
                . '&acreage=' . $acreage
                . '&waterfront=' . $waterfront
                . '&pool=' . $pool
                . '&page=' . $page
                . '&sortBy=' . $sortBy
                . '&orderBy=' . $orderBy
        );

        $results = json_decode($apiCall->getBody());

        return $results;
    }

    public function listing($mlsNumber)
    {
        $response = $this->client->request(
            'GET',
            'listing/'. $mlsNumber
        );

        return json_decode($response->getBody());
    }

    public function agentListings($mlsId)
    {
        $response = $this->client->request(
            'GET',
            'agentlistings?agentId='. $mlsId
        );

        return json_decode($response->getBody());
    }

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
