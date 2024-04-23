<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/04_quicksort/php/03_recursive_count.php
function recursive_max(array $items): ?int
{
    // Edge cases are 0 or 1 items, which need to be handled separately.
    if (count($items) === 0) {
        return null;
    }

    if (count($items) === 1) {
        return $items[0];
    }

    // Base case is exactly 2 items to compare.
    if (count($items) === 2) {
        return $items[0] > $items[1] ? $items[0] : $items[1];
    }

    // Recursive case is to pop one item off the list and try again.
    $sub_items = recursive_max(array_splice($items, 1));

    return $items[0] > $sub_items ? $items[0] : $sub_items;
}

assert(recursive_max([]) === null);
assert(recursive_max([10]) === 10);
assert(recursive_max([10, 20]) === 20);
assert(recursive_max([50, 25, 100, 75, 0]) === 100);

/**
 * The way this works is mind-bending, but visualising it makes it easier to follow.
 *
 * - There are 5 items initially, so we pop the first 1 off the start of list and call the function again with 4 items.
 * - We repeat this until there exactly 2 items, which we compare and return the highest.
 * - Then we "unwind" back through the call stack comparing each item until we've compared everything.
 * - We return the highest item.
 *
 * recursive_sum([50, 25, 100, 75, 0])
 *     recursive_sum([25, 100, 75, 0])
 *         recursive_sum([100, 75, 0])
 *             recursive_sum([75, 0])
 *             75 > 0 = 75
 *         100 > 75 = 100
 *     25 > 100 = 100
 * 50 > 100 = 100
 */
