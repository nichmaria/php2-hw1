<?php

namespace Exceptions;

use Traits\ArrayTrait;

class MultiException extends \Exception implements \ArrayAccess, \Iterator
{
    use ArrayTrait;
}
