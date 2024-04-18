<?php
function find_smallest(array $array): int
{
	$smallest = 0;

	for ($i = 0; $i < count($array); $i++) {
		if ($array[$i] < $array[$smallest]) {
			$smallest = $i;
		}
	}

	return $smallest;
}

function selection_sort(array $array): array
{
	$results = [];

	for ($i = 0, $count = count($array); $i < $count; $i++) {
		$results[] = array_splice($array, find_smallest($array), 1)[0];
	}

	return $results;
}

assert(find_smallest([1, 2, 3]) === 0);
assert(find_smallest([3, 2, 1]) === 2);
assert(find_smallest([3, 1, 2]) === 1);

assert(selection_sort([3, 1, 2]) === [1, 2, 3]);
assert(selection_sort([5, 3, 6, 2, 10]) === [2, 3, 5, 6, 10]);