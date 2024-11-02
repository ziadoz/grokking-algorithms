import math

graph = {
    "start": {
        "a": 6,
        "b": 2,
    },

    "a": {
        "finish": 1,
    },

    "b": {
        "a": 3,
        "finish": 5,
    },

    "finish": {},
}

costs = {
    "a": 6,
    "b": 2,
    "finish": math.inf,
}

parents = {
    "a": "start",
    "b": "start",
    "finish": None,
}

processed = set()

def find_lowest_cost_node(costs: dict, processed: dict):
    lowest_cost = math.inf
    lowest_cost_node = None

    for node in costs:
        cost = costs[node]

        if cost < lowest_cost and node not in processed:
            lowest_cost = cost
            lowest_cost_node = node

    return lowest_cost_node

def dijkstra(graph: dict, parents: dict, costs: dict, processed: dict):
    node = find_lowest_cost_node(costs, processed)

    while node is not None:
        cost = costs[node]
        neighbours = graph[node]

        for neighbour in neighbours.keys():
            new_cost = cost + neighbours[neighbour]

            if new_cost < costs[neighbour]:
                costs[neighbour] = new_cost
                parents[neighbour] = node

        processed.add(node)
        node = find_lowest_cost_node(costs, processed)

dijkstra(graph, parents, costs, processed)
print(costs)
