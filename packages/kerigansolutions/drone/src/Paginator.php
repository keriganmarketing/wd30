<?php

namespace KeriganSolutions\Drone;

use Illuminate\Http\Request;

class Paginator
{
    protected $properties;
    protected $request;
    protected $url;

    public function __construct($properties, $request)
    {
        $this->properties = $properties;
        $this->request = $request;
        $this->url = $request->fullUrl();
        $this->params = $request->query();
    }

    public function configure()
    {
        $this->properties->first_page_url = $this->firstPage();
        $this->properties->last_page_url  = $this->lastPage();

        if ($this->properties->next_page_url) {
            $this->properties->next_page_url = $this->nextPage();
        }

        if ($this->properties->prev_page_url) {
            $this->properties->prev_page_url = $this->prevPage();
        }

        return $this->properties;
    }

    protected function firstPage()
    {
        return $this->url . $this->appendPage(1);
    }

    protected function lastPage()
    {
        return $this->url . $this->appendPage($this->properties->last_page);
    }

    protected function nextPage()
    {
        $nextPage = $this->request->page > 0 ? ($this->request->page + 1) : 2;

        return $this->url . $this->appendPage($nextPage);
    }

    protected function prevPage()
    {
        $prevPage = $this->request->page > 1 ? ($this->request->page - 1) : null;

        return $this->url . $this->appendPage($prevPage);
    }

    protected function appendPage($page)
    {
        if (count($this->params) > 0) {
            return '&page=' . $page;
        }

        return '?page=' . $page;
    }
}

