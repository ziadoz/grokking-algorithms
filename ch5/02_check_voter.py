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
