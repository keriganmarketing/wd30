<?php
namespace KeriganSolutions\Drone;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;

trait CallsMothership {

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri'    => 'https://mothership.kerigan.com/api/v1/',
            'http_errors' => false,
            'headers'     => [
                'Referrer' => $_SERVER['HTTP_USER_AGENT'],
                'SITE_KEY' => $_SERVER['HTTP_HOST']
            ]
        ]);
    }

    public function get($request)
    {
        try {
            return $this->client->request('GET', $request);
        }
        catch(ServerException $e) {
            return $e->getMessage();
        }
    }

    public function post($request)
    {
        return $this->client->request('POST', $request);
    }
}
