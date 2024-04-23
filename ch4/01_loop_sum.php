<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/04_quicksort/php/01_loop_sum.php
function loop_sum(array $numbers): int
{
    $total = 0;

    foreach ($numbers as $number) {
        $total += $number;
    }

    return $total;
}

assert(loop_sum([1, 2, 3, 4]) === 10);
