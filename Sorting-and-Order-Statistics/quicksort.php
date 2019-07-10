<?php

/**
 * @param  $a array  array to be sorted
 * @param  $p int    leftmost index of array $a
 * @param  $r int    next index of rightmost of array $a
 * @return $i int    partition index
 */
function partition(&$a, $p, $r)
{
    $i = $p;
    // use the last element as pivot
    $pivot = $r - 1;
    for ($j = $p; $j < $pivot; $j++) {
        if (!($a[$pivot] < $a[$j])) {
            // move elements those not more than the pivot to the left
            // do nothing if partition index equal to loop index otherwise swap values
            if ($i != $j) {
                $tmp = $a[$i];
                $a[$i] = $a[$j];
                $a[$j] = $tmp;
            }
            $i++;
        }
    }
    // swap pivot with the first value that more than pivot
    if ($i != $pivot) {
        $tmp = $a[$i];
        $a[$i] = $a[$pivot];
        $a[$pivot] = $tmp;
    }
    // by now values with index not more than $i will be not more than the pivot
    return $i;
}

function quickSort(&$a, $p, $r)
{
    if ($p < $r) {
        $q = partition($a, $p, $r);
        // sort left side of partition
        quickSort($a, $p, $q);
        // sort right side of partition
        quickSort($a, $q + 1, $r);
    }
}

function testQuickSort()
{
    $a = [2, 8, 7, 1, 3, 5, 6, 4];
    quickSort($a, 0, count($a));
    var_dump($a);
    for ($i = 0; $i < 10; $i++) {
        $a = [];
        while (count($a) < 10) {
            $a[] = rand(-500, 500);
        }
        quickSort($a, 0, count($a));
        var_dump($a);
    }
}

testQuickSort();