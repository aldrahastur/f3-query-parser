<?php

namespace F3QueryParser;

class SortController
{
    public function generateSort($options, $sort)
    {
        if(is_array(explode(',', $sort))) {
            $sortExpression = '';
            foreach (explode(',', $sort) as $item) {
                if(str_contains($sort, '-')) {
                    $sortValue = str_replace('-', '', $sort).' DESC';
                }
                else {
                    $sortValue = $item.' ASC';
                }
                if($sortExpression == '') {
                    $sortExpression = $sortValue;
                }
                else {
                    $sortExpression .= ' ,'.$sortValue;
                }
            }

            $options['sort'] = ['order' => $sortExpression];
        }
        else {
            if(str_contains($sort, '-')) {
                $options['sort'] = ['order' => str_replace('-', '', $sort).' DESC'];
            }
            else {
                $options['sort'] = ['order' => str_replace('-', '', $sort).' ASC'];
            }
        }

        return $options;
    }
}