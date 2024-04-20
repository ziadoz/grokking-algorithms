<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/01_introduction_to_algorithms/php/01_binary_search.php

function binary_search(array $array, int $search): ?int
{
	$low = 0;
	$high = count($array) - 1;

	while ($low <= $high) {
		// Need to floor so we get an integer
		$middle = floor(($low + $high) / 2);

		// We can return if there's a matching
		if ($array[$middle] === $search) { 
			return $middle;
		}

		// Otherwise we need to move the low or high
		if ($array[$middle] > $search) {
			$high = $middle - 1;	
		} else {
			$low = $middle + 1;
		}
	}

	return null;
}

$numbers = [1, 3, 5, 7, 9];

assert(binary_search($numbers, 1) === 0);
assert(binary_search($numbers, 3) === 1);
assert(binary_search($numbers, 5) === 2);
assert(binary_search($numbers, 7) === 3);
assert(binary_search($numbers, 9) === 4);
assert(binary_search($numbers, -1) === null);