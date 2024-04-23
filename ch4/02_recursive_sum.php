<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/04_quicksort/php/02_recursive_count.php
function recursive_sum(array $items): int
{
    if (count($items) === 0) {
        return 0;
    }

    return $items[0] + recursive_sum(array_slice($items, 1));
}

assert(recursive_sum([1, 2, 3, 4]) === 10);
