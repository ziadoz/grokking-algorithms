<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/04_quicksort/php/03_recursive_count.php
function recursive_count(array $items): int
{
    if (count($items) === 0) {
        return 0;
    }

    return 1 + count(array_splice($items, 1));
}

assert(recursive_count([0, 1, 2, 3, 4, 5]) === 6);
assert(recursive_count([0, 10, 20, 30, 40, 50]) === 6);
