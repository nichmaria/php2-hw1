<?php

$funcOne = function (string $str) {
    return str_replace(' ', '_', $str);
};

$funcTwo = function (string $str) {
    return str_replace(' ', '000', $str);
};

$functions = [$funcOne, $funcTwo,];

$one = 'fgh rtrtr mmm sgsh rhr';
$two = 'wy ghfj hshshs trvcg jwjw';

$strings = [$one, $two,];

function result($strings, $functions)
{
    foreach ($strings as $object) {
        foreach ($functions as $func) {
            echo $func($object);
            echo "<br>";
        }
    }
}

result($strings, $functions);
