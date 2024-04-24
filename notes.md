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

You can imagine it as a stack of post-it notes.

Internally computers and programming languages uses call stacks.

Recursion elegantly uses the call stack, as each recursive call pushes another item onto the top of the call stack. Once it's done recursing, the call stack can be "unwound".


## Chapter 4 - Divide and Conquer (D&C) and Quicksort

Divide and conquer is a recursive technique for problem solving.

It works like this:

- You figure out the **base case**, which is the simplest possible case.
- You divide or decrease your problem until it becomes the **base case**.

Often the base case for an array or list is one with 0 or 1 items. For example, to sort an array or list with 0 or 1 items you do nothing.

**Quicksort**

Quicksort is a much faster sorting algorithm than selection sort.

It works like this:

- Identify a pivot point in the list.
- Move items that are smaller into a list on the left.
- Move items that are large into a list on the right.
- This is called **partitioning**.
- Repeat this process for the left and right lists.
- Join the left, pivot and right lists together.
