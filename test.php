<?php

echo 'test here';

function generate()
{
    for ($x = 1; $x < 10; $x++) {
        yield $x;
    }
}

foreach (generate() as $num) {
    echo $num;
}
