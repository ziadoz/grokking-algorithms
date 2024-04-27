<?php
// Using the first item in the array as the pivot.
function quicksort(array $items, ): array
{
    if (count($items) < 2) {
        return $items;
    }

    $pivot = array_splice($items, 0, 1)[0];
    $left  = array_filter($items, fn (int $item) => $item <= $pivot);
    $right = array_filter($items, fn (int $item) => $item > $pivot);

    // echo '[' . implode(',', $left) . '] <= ' . $pivot . ' => [' . implode(',', $right) . ']' . "\n\n";

    return [...quicksort($left), $pivot, ...quicksort($right)];
}

assert(quicksort([10, 5, 2, 3]) === [2, 3, 5, 10]);
assert(quicksort([10, 100, 30, 96, 10_000, 42, 24, 12]) === [10, 12, 24, 30, 42, 96, 100, 10_000]);

// Using the middle item in the array as the pivot.
function quicksort_middle(array $items): array
{
    if (count($items) < 2) {
        return $items;
    }

    $pivot = array_splice($items, floor(count($items) / 2), 1)[0];
    $left  = array_filter($items, fn (int $item) => $item <= $pivot);
    $right = array_filter($items, fn (int $item) => $item > $pivot);

    echo '[' . implode(',', $left) . '] <= ' . $pivot . ' => [' . implode(',', $right) . ']' . "\n\n";

    return [...quicksort_middle($left), $pivot, ...quicksort_middle($right)];
}

assert(quicksort_middle([10, 5, 2, 3]) === [2, 3, 5, 10]);
assert(quicksort_middle([10, 100, 30, 96, 10_000, 42, 24, 12]) === [10, 12, 24, 30, 42, 96, 100, 10_000]);
