<?php

namespace KeriganSolutions\FacebookFeed\Fetchers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use KeriganSolutions\FacebookFeed\Contracts\DataFetcher;

class PostFetcher implements DataFetcher
{
    const FEED = 'permalink_url,full_picture,message,object_id,type,status_type,caption,created_time,link,attachments{target,media}';

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
                '/posts/?fields=' . self::FEED .
                '&limit=' . $limit .
                '&access_token=' . FACEBOOK_ACCESS_TOKEN .
                '&before=' . $before .
                '&after=' . $after
            );

            return json_decode($response->getBody());

        } catch (ClientException $e) {
            // Most likely a bad token or improperly formatted request
            echo '<p>This content is currently unavailable due to an error.</p>';
        }
    }
}