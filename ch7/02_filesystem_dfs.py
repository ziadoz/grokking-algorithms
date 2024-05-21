import os
import os.path

def printnames(dir: str):
    for file in sorted(os.listdir(dir)):
        fullpath = os.path.join(dir, file)
        if os.path.isfile(fullpath):
            print("- " + file)
        else:
            printnames(fullpath)

printnames(os.path.dirname(os.path.realpath(__file__)) + "/pics")
