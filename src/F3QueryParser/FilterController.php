<?php

namespace F3QueryParser;
class FilterController
{
    public function generateFilter($options, $filter)
    {

        $filterExpression = '';
        $filterValues = [];

        foreach ($filter as $key => $value) {
            if(is_array(explode(',', $value))) {
                $counter = 1;
                foreach (explode(',', $value) as $item) {
                    if ($filterExpression == '') {
                        $filterExpression = $key . ' LIKE :' . $key . $counter;
                    } else {
                        $filterExpression .= ' OR '.$key .' LIKE :'.$key.$counter;
                    }
                    $filterValues[':' . $key . $counter] = $item;
                    $counter ++;
                }
            }
            else {
                if ($filterExpression == '') {
                    $filterExpression = $key . ' LIKE :' . $key;
                } else {
                    $filterExpression .= ' AND '.$key .' LIKE :'.$key;
                }
                $filterValues[':' . $key] = $value;
            }
        }

        $options['filter'] = [
            $filterExpression,
            $filterValues
        ];

        return $options;
    }
}