from os import listdir
from os.path import isfile, join, dirname, realpath
from collections import deque

def printnames(start_dir: str) -> None:
    search_queue = deque()
    search_queue.append(start_dir)

    while search_queue:
        dir = search_queue.popleft()
        for file in sorted(listdir(dir)):
            fullpath = join(dir, file)
            if isfile(fullpath):
                print("- " + file)
            else:
                search_queue.append(fullpath)

printnames(dirname(realpath(__file__)) + "/pics")
