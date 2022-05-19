<?php

namespace classes;

class Author extends Model
{
    const TABLE = 'authors';
    private $name;

    public function getName(): string
    {
        return $this->name;
    }
}
