<?php
namespace KeriganSolutions\FacebookFeed;

use KeriganSolutions\FacebookFeed\Fetchers\EventsFetcher;

class Post
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function format()
    {
        $fetcher = new EventsFetcher();

        if ($this->data->type == 'video') {
            $video            = new Video();
            $this->data->link = $video->getConvertedLink($this->data->link, $this->data->caption);
        }

        if ($this->data->type == 'event') {
            $this->full_picture = $fetcher->getEventPhoto($this->data->attachments->data[0]->target->id);
        }

        if (isset($this->data->attachments->data[0]->media->image->width) && $this->data->attachments->data[0]->media->image->width <= 100) {
            $this->full_picture = null;
        }

        return $this;
    }
}