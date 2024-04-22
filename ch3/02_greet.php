<?php
// @link https://github.com/egonSchiele/grokking_algorithms/blob/master/03_recursion/php/02_greet.php
function greet(string $name): void
{
    echo sprintf('hello, %s!' . "\n", $name);
    greet2($name);
    echo 'getting ready to say bye...' . "\n";
    bye();
}

function greet2(string $name): void
{
    echo sprintf('how are you, %s?' . "\n", $name);
}

function bye(): void
{
    echo 'ok bye!' . "\n";
}

ob_start();
greet('ziadoz');
$output = trim(ob_get_clean());

assert($output === <<<OUTPUT
hello, ziadoz!
how are you, ziadoz?
getting ready to say bye...
ok bye!
OUTPUT);
