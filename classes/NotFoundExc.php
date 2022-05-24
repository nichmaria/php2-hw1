<?php

namespace classes;

use Exception;

class NotFoundExc
extends Exception
{
    public function __construct()
    {
        $this->message = 'error 404 - not found a note with this id';
    }
}
