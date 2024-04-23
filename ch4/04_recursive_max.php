<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/04_quicksort/php/03_recursive_count.php
function recursive_max(array $items): ?int
{
    // Edge cases are 0 or 1 items, which need to be handled explicitly.
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
 * - Initially there are 5 items, so we pop the 1st item off the start and call the function recursively with 4 items.
 * - We repeat this until there exactly 2 items in the list.
 * - At the innermost point we compare the 2 items in the list and return the highest item.
 * - Now we "unwind" back through the call stack.
 * - We compare the 1st item of the list against the previously returned highest item.
 * - Once we've completely "unwound" the item we return is the highest item.
 *
 * recursive_sum([50, 25, 100, 75, 0])
 *     recursive_sum([25, 100, 75, 0])
 *         recursive_sum([100, 75, 0])
 *             recursive_sum([75, 0])
 *             75 > 0 => 75
 *         100 > 75 => 100
 *     25 > 100 => 100
 * 50 > 100 => 100
 */

// This version visualises the above, showing the recursive calls reach the innermost call, before unwinding through the call stack.
function recursive_max_visual(array $items, int $depth = 0): ?int
{
    echo str_repeat(' ', $depth * 4) . ' items: [' . implode(',', $items) . '] = count(' . count($items) . ')' . "\n\n";

    if (count($items) === 2) {
        echo str_repeat(' ', $depth * 4) . ' compare (inner): ' . $items[0] . ' > ' . $items[1] . ' = ' . ($items[0] > $items[1] ? $items[0] : $items[1]) . "\n\n";
        return $items[0] > $items[1] ? $items[0] : $items[1];
    }

    $sub_items = recursive_max_visual(array_splice($items, 1), $depth + 1);

    echo str_repeat(' ', $depth * 4) . ' compare (unwinding): ' . $items[0] . ' > ' . $sub_items . ' = ' . ($items[0] > $sub_items ? $items[0] : $sub_items) . "\n\n";
    return $items[0] > $sub_items ? $items[0] : $sub_items;
}

recursive_max_visual([50, 25, 100, 75, 0]);

/**
 * The lines added here show how each call recurses until it hits the innermost call, before unwinding: 
 *
 * | items: [50,25,100,75,0] = count(5)
 * |
 * |    | items: [25,100,75,0] = count(4)
 * |    |
 * |    |    | items: [100,75,0] = count(3)
 * |    |    |
 * |    |    |    | items: [75,0] = count(2)
 * |    |    |    |
 * |    |    |    | compare (inner): 75 > 0 = 75
 * |    |    |
 * |    |    | compare (unwinding): 100 > 75 = 100
 * |    |
 * |    | compare (unwinding): 25 > 100 = 100
*  |
 * | compare (unwinding): 50 > 100 = 100
 */
