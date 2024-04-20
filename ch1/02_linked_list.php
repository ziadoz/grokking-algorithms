<?php
// There wasn't any code for this in the book, I just whipped something up myself.

class LinkedList
{
	public function __construct(public mixed $value, public ?LinkedList $next = null)
	{
	}

    public function insert(LinkedList $insert): void
    {
        $insert->next = $this->next;
        $this->next = $insert;
    }
}

function assert_values(array $values, LinkedList $list): void
{
    $current = null;

    foreach ($values as $position => $value) {
        $current = $position === 0 ? $list : $current->next;
        assert($current->value === $value);
    }
}

$list = new LinkedList(
	value: 'Foo', 
	next: new LinkedList(
		value: 'Bar',
		next: new LinkedList(
			value: 'Baz',
			next: new LinkedList(value: 'Qux'),
		),
	),
);

assert_values(['Foo', 'Bar', 'Baz', 'Qux'], $list);

$list->next->next->insert(new LinkedList(value: 'Quack'));

assert_values(['Foo', 'Bar', 'Baz', 'Quack', 'Qux'], $list);

