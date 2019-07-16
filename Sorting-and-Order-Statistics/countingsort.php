<?php

/**
 * @param $a array  array elements with values that no less than 0
 * @return array    sorted array
 */
function countingSort($a)
{
    $len = count($a);
    // initialize an empty array according to the max value
    $max = $a[0];
    for ($i = 1; $i < $len; $i++) {
        if ($a[$i] > $max) {
            $max = $a[$i];
        }
    }
    $c = [];
    $new = [];
    for ($i = 0; $i < ($max + 1); $i++) {
        $c[$i] = 0;
        $new[$i] = 0;
    }
    // occurrences of array values
    for ($i = 0; $i < $len; $i++) {
        $c[$a[$i]] += 1;
    }
    // calculate new position of values
    for ($i = 1; $i < ($max + 1); $i++) {
        $c[$i] += $c[$i - 1];
    }
    for ($i = ($len - 1); $i > -1; $i--) {
        $new[--$c[$a[$i]]] = $a[$i];
    }
    return $new;
}

function testCountingSort()
{
    $a = [2, 5, 3, 0, 2, 3, 0, 3];
    $a = countingSort($a);
    var_dump($a);
}
testCountingSort();