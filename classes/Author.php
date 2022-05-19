<?php

namespace classes;

class Author extends Model
{
    const TABLE = 'authors';
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }
}
