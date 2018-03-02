<?php
namespace KeriganSolutions\FacebookFeed;

/**
 * @version 1.0.0
 */

use KeriganSolutions\FacebookFeed\Feed\Feed;
use KeriganSolutions\FacebookFeed\Fetchers\PostFetcher;
use KeriganSolutions\FacebookFeed\Fetchers\FacebookRequest;
use KeriganSolutions\FacebookFeed\Parsers\PostParser;

class FacebookFeed
{
    /**
     * @param int $limit The number of posts to display
     * @param string $before The cursor before the data
     * @param string $after The cursor after the data
     *
     * @return KeriganSolutions\FacebookFeed\Feed
     */
    public static function fetch($limit = 5, $before = null, $after = null)
    {
        $facebook = new FacebookRequest($limit, $before, $after);
        $posts    = new PostFetcher();

        $response = $facebook->fetch($posts);
        $parser   = new PostParser();

        $feed     = new Feed($parser, $response);

        return $feed->output();
    }
}
