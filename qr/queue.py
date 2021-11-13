class Queue:
    def __init__(self, len):
        # Intialise empty queue
        self.length = len
        self.queue = ['\0'] * self.length
        self.f = -1
        self.r = -1

    def isempty(self):
        if (self.f == -1) and (self.r == -1):
            print("The queue is empty\n")
            return True

    def isfull(self):
        if self.r + 1 == self.length:
            print("Queue is full\n")
            return True

    # Add an item to linear queue
    def enQueue(self, item):
        self.f
        self.r
        if self.isempty() == True:
            self.f = 0
            self.r = 0
            self.queue[self.r] = item
        else:
            if self.isfull() != True:
                self.r = self.r + 1
                self.queue[self.r] = item

    def display(self):
        if self.isempty() != True:
            for i in range(self.f, self.r + 1):
                print(self.queue[i], end=" ")
            print("\n")

    # removing an item from non empty linear queue
    def deQueue(self):
        if self.isempty() != False:
            item = self.queue[self.f]
            if self.f == self.r:  # if the last item has been copied
                self.f = -1
                self.r = -1
            else:  # not the last item copied - usual process
                self.f = self.f + 1#
#
# q = Queue(10)
# q.isempty()
# q.deQueue()
#
# q.enQueue(1)
# q.enQueue(2)
# q.enQueue(3)
# q.enQueue(4)
# q.enQueue(5)
# q.display()
#
# q.enQueue(6)
# q.enQueue(7)
# q.enQueue(8)
# q.enQueue(9)
# q.enQueue(10)
# q.enQueue(11)
# q.display()
#
# q.deQueue()
# q.deQueue()
# q.deQueue()
# q.deQueue()
# q.deQueue()
# q.display()
# q.deQueue()
# q.deQueue()
# q.deQueue()
# q.deQueue()
# q.deQueue()
# q.display()
#
#
# q.enQueue(1)
# q.display()
#
# q.deQueue()
# q.deQueue()
#
# q.display()

            print(item, end="\n")

