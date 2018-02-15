<?php
namespace App;

use App\SearchObject;

class SearchParameters extends SearchObject
{
    public function __construct($params)
    {
        parent::__construct($params);
    }

    public function getQueryString()
    {
        return $this->toQueryString();
    }
}
