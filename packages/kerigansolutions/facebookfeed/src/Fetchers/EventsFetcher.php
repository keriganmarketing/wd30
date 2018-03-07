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
    protected $accessToken;
    protected $pageId;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://graph.facebook.com/v2.11']);
        $this->accessToken = auth()->user()->fb_access_token;
        $this->pageId      = auth()->user()->fb_page_id;
    }

    public function get($limit, $before, $after)
    {
        try {
            $response = $this->client->request(
                'GET',
                '/' . $this->pageId .
                '/events/?fields=' . self::EVENTS .
                '&limit=' . $limit .
                '&before=' . $before .
                '&after=' . $after .
                '&access_token=' . $this->accessToken
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
                '&access_token=' . $this->accessToken
            );

            return json_decode($response->getBody())->photos->data[0]->images[0]->source;

        } catch (ClientException $e) {
            // Most likely a bad token or improperly formatted request
            echo '<p>This content is currently unavailable due to an error.</p>';
        }
    }
}