<?php
class LinkedList
{
	public function __construct(public mixed $value, public ?LinkedList $next = null)
	{
	}
}

$links = new LinkedList(
	value: 'Foo', 
	next: new LinkedList(
		value: 'Bar',
		next: new LinkedList(
			value: 'Baz',
			next: new LinkedList(value: 'Qux'),
		),
	),
);

assert($links->value === 'Foo');
assert($links->next->value === 'Bar');
assert($links->next->next->value === 'Baz');
assert($links->next->next->next->value === 'Qux');