<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/03_recursion/php/03_factorial.php
// Factorial using recursion.
// 5! = 5 * 4 * 3 * 2 * 1 = 120
function factorial(int $x): int
{
    return $x === 1 ? 1 : $x * factorial($x - 1);
}

assert(factorial(5) === 120);
