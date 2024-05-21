# Grokking Algorithms Notes

## Chapter 1 - Binary Search

**Binary Search**

An efficient way to find an item in a list.

It can find an item in a list containing 4 billion items in just 32 operations.

O(log n) = log time

It works like this:

- Sort the items in the list from lowest to highest.
- Check if the middle item in the list to the item you're searching for is higher or lower.
- Throw away the half it's not in.
- Repeat until you find the item.

Way more efficient than comparing every item in the list. Doing that on a list containing 4 billion items would take 4 billion operations.

O(n) = linear time

The travelling salesperson problem is where you try to find the most efficient route to visit 5 cities (as an example).

There's no known fast solution to this.

O(n!) = super slow time

Alogirthms aren't measured using speed, they're measured in the growth of the number of operations - called big O notation.

Big O notation established the **worst** case run time.


## Chapter 2 - Selection Sort

Think of memory as being a chest of draws. Each draw is a slot of available memory with a unique address.

**Arrays**

Arrays are inserted into memory sequentially (next to each other).

This means if you need to allocate extra memory if you want to expand the array later.

Arrays are quick to read, and can be read randomly and sequential.

It's slow to insert an item into an array, as you need to reorder the items in it. You also may need to allocate more memory if not enough is available.

Similarly, deletions are slow for the same reason as insertions.

Insertions can fail due to memory availability, but deletions can't.

- _Reading:_ O(1) = constant time
- _Insertion:_ O(n) = linear time
- _Deletion:_ O(n) = linear time

**Linked Lists**

A linked list consists of nodes that point to the address of the next node.

The advantage of this is that you can insert them in any random slot of memory available.

Linked lists are slow to read because you can only traverse them sequentially.

They also actually use more memory than arrays generally, as they need additional memory to hold the address of the next node.

It's quick to insert an item into a linked list than an array, especially if you want to insert something in the middle.

Similarly, deletions are quick for the same reason as insertions.

Insertions can fail due to memory availability, but deletions can't.

- _Reading:_ O(n) = linear time
- _Insertion:_ O(1) = constant time
- _Deletion:_ O(1) = constant time

It's common practice to keep track of the head and tail of an array or linked list.

**Selection Sort**

O(n x n) = O(n²) time

It works like this:

- Find the highest or lowest ranking item in the list.
- Move it to a new list.
- Repeat on the remaining items in list.

The number of items you have to search through decreases by one item each time, because you move the item out of the list.


## Chapter 3 - Recursion and Call Stacks

**Recursion**

Recursion functions call themselves to elegantly solve problems.

There are two parts to a recursive function:

The **base case** tells determines when the function does not call itself again (i.e. when to end).

The **recursive case** tells the function to call itself again.

I think of recursion as winding something up until it hits the innermost point before it begins to unwind again. Like that hadouken code meme.

**Call Stack**

A call stack is a data structure where new are items are pushed on to the top of the stack, and then popped off the top of the stack.

LIFO = Last In, First Out

You can imagine it as a stack of post-it notes.

Internally computers and programming languages uses call stacks.

Recursion elegantly uses the call stack, as each recursive call pushes another item onto the top of the call stack. Once it's done recursing, the call stack can be "unwound".


## Chapter 4 - Divide and Conquer (D&C) and Quicksort

**Divide and Conquer**

Divide and conquer is a recursive technique for problem solving. It works by breaking a problem down into smaller and smaller pieces.

It works like this:

- You figure out the **base case**, which is the simplest possible case.
- You divide or decrease your problem until it becomes the **base case**.

The base case is a list with 0 or 1 items. To sort a list with 0 or 1 items you do nothing.

**Quicksort**

Quicksort is a much faster sorting algorithm than selection sort.

It works like this:

- Identify a pivot point in the list.
- Move items that are smaller into a list on the left.
- Move items that are large into a list on the right.
- This is called **partitioning**.
- Repeat this process for the left and right lists.
- Join the left, pivot and right lists together.

The worst case scenario for quicksort is choosing the first item as a pivot for an already sorted list. This will incur a recursive call/call stack per item, as everything will always end up in the right hand list. O(n) items * O(n) call stacks = O(n²)

The best case scenario is choosing the middle item as a pivot, as the number of recursive calls/call stacks will be smaller. O(n) items * O(log n) call stacks = O(n log n)

The best case is also the average case. If you always choose a random element in the list as a pivot, quicksort will complete in O(n log n) on average. One exception is if all the items are the same, but this can be avoided with additional logic.

Quicksort is one of the fastest sorting algorithms, and a good example of divide and conquer.

Given two algorithms with the same big O notation running times, one can be consistently faster than the other. For example, quicksort is faster than mergesort.

Constants (C) don't matter in big O notation:

- Simple Search = 10ms per item (C) = 10ms * 4 billion items = 10ms * 4 billion operations = 463 days
- Binary Search = 1s per item (C) = 1s * 4 billion items = 1s * 32 operations = 32 seconds

The constants in these examples doesn't matter - binary search performs significantly less operations.


## Chapter 5 - Hash Tables

**Hash Functions**

A hash function is a function that given a string (e.g. `apple`) returns a number (e.g. `4`). The number returned will always be consistent for the string, so `apple` will always return `4`. Multiple strings can be mapped to numbers.

**Hash Tables**

A hash table is a combination of a hash function and an array. The number returned is the index of the value in the array that corresponds to the given string.

If the hash function is given `apple` and returns `4` with the following array, we know the price is `0.67`:

| 1    | 2    | 3    | 4    | 5    |
|------|------|------|------|------|
| 1.49 | 0.79 | 2.49 | 0.67 | 1.49 |

A hash table is O(1), because looking up an item in the array using a string is instant.

This type of one-to-one mapping is known as `injective function`.

A hash table is perfect when you want to:

- Map one thing to another (modelling relationships from one thing to another).
- Look something up instantly.
- Filter out duplicates.
- Caching or memoizing data to avoid work.

Some examples of using a hash table are:

- A phone book (`jenny => 8675309`, `emergency => 911`)
- A DNS look up cache (e.g. `google.com => xxx.xxx.xxx.xxx`)
- A webpage cache (e.g. `facebook.com/contact => <p>Contact...</p>`)

**Collisions**

A collision is when multiple strings passed to a hash function map to the same underlying array item. This could cause data to be overridden.

A solution is to have the array item point to a linked list, however this would mean the hash table no longer instant, as the linked list needs to be traversed.

Avoiding collisions is vital to getting average case performance out of a hash table.

The way to do this is by having a low load factor and a good hash function.

**Load Factor**

The load factor of a hash table is: `number of items / total number of array slots`.

A load factor of 1 or greater means there's enough slots free.

To make more room a new array is created, typically double the size of the original, and then the items are re-inserted into that. This is called resizing.

Typically, resizing is done when the load factor is greater than 0.7.

Resizing is expensive, but hash tables are still O(1) on average.

Hash functions aren't something you'd ever need to think about, but real world examples are MurmurHash and CityHash.

- [MurmurHash Wikipedia](https://en.wikipedia.org/wiki/MurmurHash)
- [PHP 8.1 MurmurHash](https://php.watch/versions/8.1/MurmurHash3)
- [MurmurHash in Rust](https://www.keiruaprod.fr/blog/2023/04/02/the-murmur-hashing-algorithm.html)
- [Bit Rotation](https://www.geeksforgeeks.org/rotate-bits-of-an-integer/)

O(1) = constant time = the time taken to perform the operation will stay the same regardless

Hash tables are really fast for search, insert and delete, and catching duplicates.


## Chapter 6 - Breadth First Search

**Graphs**

A graph is a data structure that models a set of connections, for example, routes to navigate from A to B, who owes who money or who is friends with whom.

A graph consistents of nodes and edges. An edge connects one node to another, and it may or may not have a direction.

The terminology for nodes on either side of an edge with a direction is "in-neighbour" or "out-neighbour".

So given: `A -> B` A is an in-neighbour of B. B is an out-neighbour of A.

If there is no edge direction (i.e. undirected) then the terminology is just "neighbour".

Traversing a graph can cause infinite loops because they can be cyclical, so it's necessary to keep track of what's been traversed to avoid this.

**Queues**

A queue is a data stucture that works like a real life queue. The person who joins the queue to get on a bus first will get on first, the person who joins the queue second will get on the bus second, etc.

Unlike call stacks, which are LIFO, queues are FIFO:

FIFO = First In, First Out

Adding an item to the end of a queue is known an "enqueueing", and removing an item from the start of a queue is known as "dequeueing". Items in the queue can only be accessed this way, and not by an index like an array.

**Breath First Search**

A breadth first search is an algorithm to search a graph. It can be used to find out:

1. Is there a path from A to B?
2. What's the shortest path from A to B?

It can be used for things such as spell checking (find closest actual word to the mispelt one), navigation (getting from point A to B) and crawling (like a search engine).

A breadth first search works by radiating out from starting point, so all the nodes 1 degree out are searched first, then all the nodes 2 degrees out are searched second etc.

In effect the breadth first search algorithm traverses or walks the tree.

This is achieved using a queue. All the nodes 1 degree out are added to the queue first, then as each of those nodes is dequeued/searched, _their_ nodes are added to the queue if a match isn't found - radiating outwards.

O(V + E) = O(Vertices + Edges)

A topological sort can be used to sort a directed graph in order of of dependencies. So given `A -> B -> C`, C must be done before B, and B must be done before A.

A tree is a special subset of graph where no edges ever point backwards. A tree is always a graph, but not all graphs are trees.


## Chapter 7 - Trees

**Trees**

A tree is a specialised type of graph that is used in everything from compressiom algorithms (Huffman coding) to databases (balanced-tree indexes).

In a tree the terminology for nodes is:

- Root - A single node that has no parent and leads to all the other nodes (aka a "rooted tree").
- Parent - A node that has child nodes belong to it.
- Child - A node that belongs to a parent.
- Leaf - A node with no children.

Traversing a tree can never end up in an infinite loop because they don't have cycles and only go in one direction.

**Depth First Search**

Depth first search essentially uses recursion to traverse each node's children until it hits a leaf. An example of how it could be used is to print out all the files in a filesystem tree. It **cannot** be used to find the shortest path from A to B like breadth first search can.
