<?php

namespace KeriganSolutions\FacebookFeed\Fetchers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use KeriganSolutions\FacebookFeed\Contracts\DataFetcher;

class ReviewsFetcher implements DataFetcher
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://graph.facebook.com/v2.11']);
    }

    public function get($limit, $before, $after)
    {
        try {
            $response = $this->client->request(
                'GET',
                '/' . FACEBOOK_PAGE_ID .
                '/ratings'.
                '?limit=' . $limit .
                '&access_token=' . FACEBOOK_PAGE_ACCESS_TOKEN .
                '&before=' . $before .
                '&after=' . $after
            );

            return json_decode($response->getBody());

        } catch (ClientException $e) {
            // Most likely a bad token or improperly formatted request
            echo $e->getMessage();
            echo '<p>This content is currently unavailable due to an error.</p>';
        }
    }
}