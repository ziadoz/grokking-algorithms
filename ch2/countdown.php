<?php
function countdown(int $number): void
{
    echo $number;

    if ($number <= 0) {
        return;
    }

    countdown($number - 1);
}

ob_start();
countdown(5);
$output = ob_get_clean();

assert($output === '543210');