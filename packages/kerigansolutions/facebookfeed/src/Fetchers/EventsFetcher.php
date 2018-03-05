<?php

namespace KeriganSolutions\FacebookFeed\Fetchers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use KeriganSolutions\FacebookFeed\Contracts\DataFetcher;

class EventsFetcher implements DataFetcher
{
    const EVENTS = 'description,end_time,name,place,start_time,cover';
    const EVENT_PHOTO = 'photos{images}';

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
                '/events/?fields=' . self::EVENTS .
                '&limit=' . $limit .
                '&before=' . $before .
                '&after=' . $after .
                '&access_token=' . FACEBOOK_ACCESS_TOKEN
            );

            $feed = json_decode($response->getBody());

            return $feed;
        } catch (ClientException $e) {
            // Most likely a bad token or improperly formatted request
            echo '<p>This content is currently unavailable due to an error.</p>';
        }
    }

    public function getEventPhoto($eventId)
    {
        try {
            $response = $this->client->request(
                'GET',
                $eventId .
                '?fields=' . self::EVENT_PHOTO .
                '&access_token=' . FACEBOOK_ACCESS_TOKEN
            );

            return json_decode($response->getBody())->photos->data[0]->images[0]->source;

        } catch (ClientException $e) {
            // Most likely a bad token or improperly formatted request
            echo '<p>This content is currently unavailable due to an error.</p>';
        }
    }
}