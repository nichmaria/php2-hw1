<?php

namespace Entities;

class AdminDataTable
{
    private array $data;

    public function __construct(array $objects, array $functions)
    {
        $i = 0;
        $j = 0;
        foreach ($objects as $object) {
            foreach ($functions as $function) {
                $this->data[$i][$j] = $function($object);
                $j++;
            }
            $i++;
            $j = 0;
        }
    }
}
