<?php
namespace App;

use App\SearchObject;

class SearchParameters extends SearchObject
{
    /**
     * Constructor
     */
    public function __construct($params)
    {
        parent::__construct($params);
    }

    /**
     * Get the query for the property search.
     * 
     * @return string
     */
    public function getQueryString()
    {
        return $this->toQueryString();
    }
}
