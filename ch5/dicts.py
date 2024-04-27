# A book containing prices for groceries
book = {}
book['apple'] = 0.67
book['milk'] = 1.49
book['avocado'] = 1.49

# Or a quicker syntax
# book = {'apple': 0.67, 'milk': 1.49, 'avocado': 1.49}

# Print the book out
print(book)

# Print the price of an item in the book
print(book['apple'])

# A phone book
phone_book = {'jenny': '8675309', 'emergency': '911'}

# Find a phone book entry
print(phone_book['jenny'])

# Record of who has voted
voted = {}

def check_voter(name):
    if name in voted:
        print("kick them out!")
    else:
        voted[name] = True
        print("let them vote!")

# Check voters as they come in
check_voter("tom")
check_voter("mike")
check_voter("mike")
