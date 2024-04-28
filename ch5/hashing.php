<?php
// Part of MurmurHashing is bit rotation, which is shifting in a direction, and then appending the remainder bits to the other end.
// ROL = Rotate Left, ROR = Rotate Right
// @link: https://www.keiruaprod.fr/blog/2023/04/02/the-murmur-hashing-algorithm.html
// @link: https://www.geeksforgeeks.org/rotate-bits-of-an-integer/
// @link: https://www.php.net/manual/en/language.types.integer.php
// @link: https://onlinetoolz.net/bitshift#base=10&value=229&bits=8&steps=3&dir=l&type=circ&allsteps=1
// @link: https://alexandra-zaharia.github.io/posts/bitwise-nuggets-rotate-number-to-the-left-on-byte-precision/

function bin(int $n)
{
    return sprintf('%08b', $n);
}

function rotate_left(int $n, int $d): int
{
    return ($n << $d) | ($n >> (32 - $d));
}

$rotations = [
    ['n' => 100, 'd' => 3, 'o' => 35], // 01100100 -> 00100011
    ['n' => 229, 'd' => 3, 'o' => 47], // 11100101 -> 00101111
];

foreach ($rotations as ['n' => $a, 'd' => $d, 'o' => $o]) {
    $rotated = rotate_left($a, $d);

    echo sprintf('%d (%s) ROL %d (%s)', $a, bin($a), $o, bin($o)) . "\n";
    echo ($rotated === $o ? '✔️' : '❌') . ' ' . $rotated . "\n";
}
