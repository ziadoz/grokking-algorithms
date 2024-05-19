<?php
class MyQueue extends SplQueue
{
    public function enqueueMany(string ...$values): void
    {
        foreach ($values as $value) {
            $this->enqueue($value);
        }
    }
}

function person_is_seller(string $name): bool {
    return $name[-1] === 'm';
}

function search(array $graph, string $name): bool
{
    $queue = new MyQueue;
    $queue->enqueueMany(...$graph[$name]);
    $searched = [];

    foreach ($queue as $person) {
        if (in_array($person, $searched)) {
            continue;
        }

        echo sprintf('- searched %s', $person) . "\n";

        if (person_is_seller($person)) {
            echo sprintf('%s is a mango seller!', $person) . "\n";
            return true;
        } else {
            $queue->enqueueMany(...$graph[$person]);
            $searched[] = $person;
        }
    }

    echo 'no-one is a mango seller' . "\n";
    return false;
}


$graph = [
    'you'    => ['alice', 'bob', 'claire'],
    'bob'    => ['anuj', 'peggy'],
    'alice'  => ['peggy'],
    'claire' => ['thom', 'jonny'],
    'anuj'   => [],
    'peggy'  => [],
    'thom'   => [],
    'jonny'  => [],
];

search($graph, 'you');
