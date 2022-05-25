<?php

namespace classes;

class MultiException
extends \Exception
implements \ArrayAccess, \Iterator
{
    use TraitArray;
}
