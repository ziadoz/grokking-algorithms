# Using sets here is vital, as they only contain unique entries, and they can be checked for intersection, union, difference etc.
# In Python:
# set1 | set2 = union
# set1 & set2 = intersection
# set1 - set2 = difference
# https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Set

states_needed = set(["mt", "wa", "or", "id", "nv", "ut", "ca", "az"])

stations = {
    "kone": set(["id", "nv", "ut"]),
    "ktwo": set(["wa", "id", "mt"]),
    "kthree": set(["or", "nv", "ca"]),
    "kfour": set(["nv", "ut"]),
    "kfive": set(["ca", "az"]),
}

def greedy(states_needed: dict, stations: dict) -> set:
    final_stations = set()

    while states_needed:
        best_station = None
        states_covered = set()

        for station, states in stations.items():
            covered = states_needed & states # Intersect the two sets to see how much overlap there is...

            if len(covered) > len(states_covered):
                best_station = station
                states_covered = covered

        states_needed -= states_covered # Subtract the states we've covered from those that we still need to cover...
        final_stations.add(best_station)

    return final_stations

print(greedy(states_needed, stations))
