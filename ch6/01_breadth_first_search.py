from collections import deque

def person_is_seller(name: str) -> bool:
    return name[-1] == 'm';

def search(graph: map, name: str) -> bool:
    search_queue = deque()
    search_queue += graph[name]
    searched = set()

    while search_queue:
        person = search_queue.popleft()
        print("- searching {}".format(person))

        if not person in searched:
            if person_is_seller(person):
                print("{} is a mango seller!".format(person))
                return True
            else:
                search_queue += graph[person]
                searched.add(person)

    print("no-one is a mango seller!")
    return False

graph = {}
graph["you"] = ["alice", "bob", "claire"]
graph["bob"] = ["anuj", "peggy"]
graph["alice"] = ["peggy"]
graph["claire"] = ["thom", "jonny"]
graph["anuj"] = []
graph["peggy"] = []
graph["thom"] = []
graph["jonny"] = []

search(graph, "you")
