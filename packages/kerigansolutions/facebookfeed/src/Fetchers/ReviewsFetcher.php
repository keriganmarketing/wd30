<?php

namespace KeriganSolutions\FacebookFeed\Fetchers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use KeriganSolutions\FacebookFeed\Contracts\DataFetcher;

class ReviewsFetcher implements DataFetcher
{
    protected $client;
    protected $accessToken;
    protected $pageId;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://graph.facebook.com/v2.11']);
        $this->accessToken = auth()->user()->fb_access_token;
        $this->pageId = auth()->user()->fb_page_id;
    }

    public function get($limit, $before, $after)
    {
        try {
            $response = $this->client->request(
                'GET',
                '/' . $this->pageId .
                '/ratings'.
                '?limit=' . $limit .
                '&access_token=' . $this->accessToken .
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