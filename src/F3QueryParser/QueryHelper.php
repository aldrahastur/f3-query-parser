<?php

namespace F3QueryParser;

use BaseController;

class QueryHelper extends BaseController
{
    function parseUrl($url) : array
    {
        $options = [
            'filter' => [],
            'options' => []
        ];
        $query = [];
        parse_str($url, $query );

        if(array_key_exists('filter', $query)) {
            $options = $this->filterHelper->generateFilter($options, $query['filter']);
        }

        if(array_key_exists('sort', $query)) {
            $options = $this->sortHelper->generateSort($options, $query['sort']);
        }

        if(array_key_exists('page', $query)) {
            $options['options']['page'] = $query['page'];
        }

        if(array_key_exists('limit', $query)) {
            $options['options']['limit'] = $query['limit'];
        }
        return $options;
    }
}