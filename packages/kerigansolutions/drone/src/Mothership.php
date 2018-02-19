<?php
namespace KeriganSolutions\Drone;

use \GuzzleHttp\Client;
use App\SearchParameters;
use Illuminate\Http\Request;
use KeriganSolutions\Drone\Paginator;
use KeriganSolutions\Drone\CallsMothership as CallsMothership;

class Mothership
{
    use CallsMothership;

    protected $client;

    public function search(Request $request)
    {
        $searchTerms = new SearchParameters($request->all());
        $apiCall     = $this->get($searchTerms->getQueryString());
        $properties  = json_decode($apiCall->getBody());
        $results     = $this->paginate($properties, $request);

        return $results;
    }

    public function listing($mlsNumber)
    {
        $response = $this->get('listing/'. $mlsNumber);

        return json_decode($response->getBody());
    }

    public function agentData($email)
    {
        $response = $this->get('agentdata?email='. $email);

        return json_decode($response->getBody());
    }

    public function agentListings($mlsId)
    {
        $response = $this->get('agentlistings?agentId='. $mlsId);

        return json_decode($response->getBody());
    }

    public function agentListingsWithAnalytics($mlsId)
    {
        $response = $this->get('agentlistings?agentId='. $mlsId .'&analytics=true');

        return json_decode($response->getBody());
    }

    protected function paginate($properties, $request)
    {
        $paginator = new Paginator($properties, $request);

        return $paginator->configure();
    }
}
