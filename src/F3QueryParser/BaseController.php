<?php

namespace F3QueryParser;


class BaseController
{
    public FilterController $filterHelper;
    public SortController $sortHelper;
    public function __construct() {
        $this->filterHelper = new FilterController();
        $this->sortHelper = new SortController();
    }
}