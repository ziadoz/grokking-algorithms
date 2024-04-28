<?php
// Part of MurmurHashing is bit rotation, which is shifting in a direction, and then appending the remainder bits to the other end.
// Known as bit rotation or circular shifting.
// ROL = Rotate Left, ROR = Rotate Right
// @link: https://www.keiruaprod.fr/blog/2023/04/02/the-murmur-hashing-algorithm.html
// @link: https://www.geeksforgeeks.org/rotate-bits-of-an-integer/
// @link: https://www.php.net/manual/en/language.types.integer.php
// @link: https://onlinetoolz.net/bitshift#base=10&value=229&bits=8&steps=3&dir=l&type=circ&allsteps=1
// @link: https://alexandra-zaharia.github.io/posts/bitwise-nuggets-rotate-number-to-the-left-on-byte-precision/

function bin(int $n, int $bits = 8): string
{
    return sprintf('%0' . $bits . 'b', $n);
}

function rotate_left(int $n, int $d, int $bits = 8): int
{
    // Define a mask of 1s for the expected number of bits.
    // For example:
    // - (1 << 8) = 100000000 = 256 (9 bits) - 1 = 11111111 = 255 (8 bits).
    // - (1 << 32) = 10000000000000000 = 65536 (17 bits) - 1 = 1111111111111111 = 65535 (16 bits)
    $mask = (1 << $bits) - 1;

    // Ensure the shift number is within the number of expected bits.
    $d %= $bits;

    // Shift the number left $n times (<<).
    // Shift the number right INT_BITS - $d times (>>).
    // Add the two together (|).
    // Apply the mask (&).
    // For example:
    // - 100 = 01100100
    // - 100 << 3 = 00100000 (011 at start is shifted off, zeros padded on the end).
    // - 100 >> (8 - 3) = 00000011 (00100 at the end is shifted off, zeros padded on the start).
    // - 00100000 + 00000011 = 00100011 (i.e. 011 has been shifted from the start to the end).
    return (($n << $d) | ($n >> ($bits - $d))) & $mask;
}

function rotate_right(int $n, int $d, int $bits = 8): int
{
    $mask = (1 << $bits) - 1;

    $d %= $bits;

    return (($n >> $d) | ($n << ($bits - $d))) & $mask;
}

$left_rotations = [
    ['n' => 100, 'd' => 3, 'o' => 35], // 01100100 -> 00100011
    ['n' => 229, 'd' => 3, 'o' => 47], // 11100101 -> 00101111
];

foreach ($left_rotations as ['n' => $a, 'd' => $d, 'o' => $o]) {
    $rotated = rotate_left($a, $d);

    echo sprintf('%d (%s) ROL %d (%s)', $a, bin($a), $o, bin($o)) . "\n";
    echo ($rotated === $o ? '✔️' : '❌') . ' ' . $rotated . "\n\n";
}

$right_rotations = [
    ['n' => 100, 'd' => 3, 'o' => 140], // 01100100 -> 10001100
    ['n' => 229, 'd' => 3, 'o' => 188], // 11100101 -> 10111100
];

foreach ($right_rotations as ['n' => $a, 'd' => $d, 'o' => $o]) {
    $rotated = rotate_right($a, $d);

    echo sprintf('%d (%s) ROR %d (%s)', $a, bin($a), $o, bin($o)) . "\n";
    echo ($rotated === $o ? '✔️' : '❌') . ' ' . $rotated . "\n\n";
}
