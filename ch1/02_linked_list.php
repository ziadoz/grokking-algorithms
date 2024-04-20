<?php
// There wasn't any code for this in the book, I just whipped something up myself.

class LinkedList
{
	public function __construct(public mixed $value, public ?LinkedList $next = null)
	{
	}
}

function insert(LinkedList $insert, LinkedList $after): void
{
    $next = $after->next;
    $after->next = $insert;
    $insert->next = $next;
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

insert(new LinkedList(value: 'Quack'), $list->next->next);

assert_values(['Foo', 'Bar', 'Baz', 'Quack', 'Qux'], $list);

