<?php
class LinkedList
{
	public function __construct(public mixed $value, public ?LinkedList $next)
	{
	}

	// @todo: Implement head and tail methods. Need to hold $previous and $next for that to work.
}

class LinkedListBuilder
{
	public static function build(array $values): LinkedList
	{
		$list = [];

		foreach (array_reverse($values) as $index => $value) {
			$list[] = new LinkedList(value: $value, next: $list[$index - 1] ?? null);
		}

		return end($list);
	}
}

$head = LinkedListBuilder::build(['Foo', 'Bar', 'Baz', 'Qux']);
assert($head->value === 'Foo');
assert($head->next->value === 'Bar');
assert($head->next->next->value === 'Baz');
assert($head->next->next->next->value === 'Qux');