class PQueue:
    def __init__(self, size):
        self.__items = [None] * size
        self.__fp = 0
        self.__rp = -1
        self.__maxSize = size
        self.__size = 0

    def add(self, i, p):

        if self.__size == self.__maxSize:
            raise Exception("Queue full!")

        current = self.__fp

        item_added = False

        while not item_added and current <= self.__rp:

            if self.__items[current][1] <= p:

                current += 1

            else:

                # shuffle items to right and insert item at current

                backtrack = self.__rp

                while backtrack >= current:
                    self.__items[backtrack + 1] = self.__items[backtrack]

                    backtrack -= 1

                self.__items[current] = [i, p]
                self.__rp += 1
                self.__size += 1
                item_added = True

        if not item_added:
            self.__rp += 1
            self.__size += 1
            self.__items[self.__rp] = [i, p]

    def remove(self):

        data = self.__items[self.__fp][0]

        self.__fp += 1

        return data

    def status(self):
        # print("FP: {}\tRP: {}\tSize: {}\t MaxSize: {}".format(
        #     self.__fp, self.__rp, self.__size, self.__maxSize
        # ))
        #print(self.__items)
        return self.__items
#
# q = PQueue(10)
# q.add("a", 1)
# q.add("b", 1)
# q.add("c", 2)
# q.add("d", 1)
# q.add("e", 3)
# q.add("f", 2)
# q.add("g", 1)
# q.add("h", 3)
# q.add("i", 4)
# q.add("j", 2)
# q.status()
