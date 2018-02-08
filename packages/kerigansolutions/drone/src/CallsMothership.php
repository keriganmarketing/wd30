<?php
namespace KeriganSolutions\Drone;

use GuzzleHttp\Client;

trait CallsMothership {

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://mothership.kerigan.com/api/v1/'
        ]);
    }

    public function get($request)
    {
        return $this->client->request('GET', $request);
    }
}