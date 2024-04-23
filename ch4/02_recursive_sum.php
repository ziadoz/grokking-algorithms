<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/04_quicksort/php/02_recursive_count.php
function recursive_sum(array $numbers): int
{
    if (count($numbers) === 0) {
        return 0;
    }

    return $numbers[0] + recursive_sum(array_slice($numbers, 1));
}

assert(recursive_sum([1, 2, 3, 4]) === 10);
