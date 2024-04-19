# Grokking Algorithms Exercises

[GitHub](https://github.com/egonSchiele/grokking_algorithms)


## Chapter 1 - Binary Search

### 1.1
Log₂ 128 = 7

### 1.2
Log₂ 256 = 8

### 1.3
O(log n)

### 1.4
O(n)

### 1.5
O(n)

### 1.6
O(n) - Explained in Chapter 4


## Chapter 2 - Selection Sort

### 2.1
Linked List

### 2.2
Linked List

### 2.3
Array

### 2.4
Need to keep allocating memory and re-sorting the entries. Inserting entries is slow.

### 2.5
**Hybrid Array + Linked List vs Array**:
Inserting - Faster (random access array then unshift onto end of linked list)
Searching - Slower (random access array, then search entire linked list)

**Hybrid Array + Linked List vs Linked List**:
Inserting - Same (random access array then unshift onto end of linked list)
Searching - Faster (only searching a partial linked list)


## Chapter 3 - Recursion and Call Stacks

### 3.1
A method called `greet` with a `name` parameter of `Maggie` was called.
This method called another method called `greet2` with the `name` parameter `Maggie` passed to it.
The `greet` method is waiting for `greet2` to complete before it can resume.

### 3.2
A recursive function with no base case would be stuck in an infinite loop.
It would continue to push calls onto the call stack until memory runs out, causing a stack overflow.


## Chapter 4 - Divide and Conquer (D&C) and Quicksort

