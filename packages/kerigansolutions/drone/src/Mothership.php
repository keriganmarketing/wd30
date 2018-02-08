<?php
namespace KeriganSolutions\Drone;

use \GuzzleHttp\Client;
use App\SearchParameters;
use KeriganSolutions\Drone\CallsMothership as CallsMothership;

class Mothership
{
    use CallsMothership;

    protected $client;

    public function search($params)
    {
        $searchTerms = new SearchParameters($params);
        $apiCall     = $this->get($searchTerms->getQueryString());
        $results     = json_decode($apiCall->getBody());

        return $results;
    }

    public function listing($mlsNumber)
    {
        $response = $this->get('listing/'. $mlsNumber);

        return json_decode($response->getBody());
    }

    public function agentListings($mlsId)
    {
        $response = $this->get('agentlistings?agentId='. $mlsId);

        return json_decode($response->getBody());
    }


}
