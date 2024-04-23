<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/04_quicksort/php/02_recursive_count.php
function sum(array $numbers): int
{
    if (count($numbers) === 0) {
        return 0;
    }

    return $numbers[0] + sum(array_slice($numbers, 1));
}

assert(sum([1, 2, 3, 4]) === 10);
