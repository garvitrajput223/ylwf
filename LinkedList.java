import java.util.Scanner;
class Node {
    int data;
    Node next;

    public Node(int data) {
        this.data = data;
        this.next = null;
    }
}

public class LinkedList {
    static Scanner sc = new Scanner(System.in);
    Node head;
    public LinkedList() {
        head = null;
    }
    //Insert Data at Begining
    /*
     * Phle ye check karege ki Head Null hai kya, if head is null, then head ko newNode ka data assign kar denge and return
     * newNode ke next ko Head assign kar denge bcoz that will become head now
     * and head ko newNode Assign kar denge.
     */
    public void addFirst(int data) {
        Node newNode = new Node(data);
        if(head == null) {
            head = newNode;
            return;
        }
        /*
         * Agar linked list mein kuch nodes already hote hai, 
         * toh naya node iss tarah se head ke baad insert kiya jaata hai, 
         * ki naya node head ban jaata hai aur iss naye node ka next pointer head ka address rakh leta hai.
         */
        newNode.next = head;
        head = newNode;
    }

    // Insert Data in the end/tail
    /* Phle ye check karege ki Head Null hai kya..............................
     * if head is not null, then we will create a new node "currentNode" which will hold the value of head initially
     * then we will traverse the list, jab tak currentNode.next ki value null nhi ho jati
     * jaise hi null value mili, currentNode ko newNode ka data assign kar denge and it will have its next = null
     */
    public void addNode(int data) {
        Node newNode = new Node(data);
        if (head == null) {
            head = newNode;
            return;
        } else {
            Node currentNode = head;
            while (currentNode.next != null) {
                currentNode = currentNode.next;
            }
            currentNode.next = newNode;
        }
    }

    // Insert at specific position
    /*
     * 
     */
    public void insertAtPosition(int pos, int data) {
        Node newNode = new Node(data);
        if(head == null) {
            head = newNode;
            return;
        }
        if(pos == 0) {
            newNode.next = head;
            head = newNode;
            return;
        }
        Node currentNode = head;
        Node lastNode = null;
        int count = 0; 
        while (currentNode != null && count < pos) {
            lastNode = currentNode;
            currentNode = currentNode.next;
            count++;
        }
        lastNode.next = newNode;
        newNode.next = currentNode;
    }

    // Delete an Item
    // 1. If the list is empty, return
    // 2. If the node to be deleted is the head node, set the head to the next node and return
    // 3. Traverse the list until you find the node to be deleted
    // 4. Set the previous node's next pointer to the node after the node being deleted
    /*
     * 
     */
    public void deleteItem(int data) {
        if(head == null) {
            System.out.println("List is empty");
            return;
        }
        /*
         * If item which is to be deleted is Head,
         * shift head to next node.
         * first head will be lost forever and collected by garbage collector
         */
        if(head.data == data) {
            head = head.next;
            return;
        }
        /*
         * 
         */
        Node curr_node = head;
        Node prev_node = null;
        
        while (curr_node != null && curr_node.data != data) {
            prev_node = curr_node;
            curr_node = curr_node.next;
        }
        
        if (curr_node != null) {
            prev_node.next = curr_node.next;
        }
    }

    // Delete from specific position
    // 1. If the list is empty, return
    // 2. If the node to be deleted is the head node, set the head to the next node and return
    // 3. Traverse the list until you reach the node at the specified position
    // 4. Set the previous node's next pointer to the node after the node being deleted
    public void deleteAtPosition(int pos) {
        if (head == null) {
            return;
        }
        
        if (pos == 0) {
            head = head.next;
            return;
        }
        
        Node curr_node = head;
        Node prev_node = null;
        int count = 0;
        
        while (curr_node != null && count < pos) {
            prev_node = curr_node;
            curr_node = curr_node.next;
            count++;
        }
        
        if (curr_node != null) {
            prev_node.next = curr_node.next;
        }
    }

    // Finding Center of Linked List
    /*
     * center find karne ke liye, we will use two pointers 1. slow: which will read one node at a time; 2. fast: which will read two nodes at a time
     * fast pointer ko tab tak traverse karege jab tak fast null ya fast ka next null nhi ho jata.
     * due to this, jab fast wala pointer list ke end me hoga to slow wala pointer list ke middle me hoga
     * Return slow;
     */
    public Node center() {
        if (head == null) {
            return null;
        }
        
        Node slow = head;
        Node fast = head;
        
        while (fast != null && fast.next != null) {
            slow = slow.next;
            fast = fast.next.next;
        }
        return slow;
    }

    // Sorting list
    /*
        insertionSort() method mein koi parameter nahi hai, lekin yeh current head ko parameter ke roop mein insertionSort() ke private method ko call karke set kar deta hai. 
        Isse yeh ensure kiya jata hai ki linked list ka head sahi tarah se sort karne ke baad update ho jaaye.
        Private method insertionSort() ek Node parameter leta hai, jo linked list ka head hota hai. Yeh ek Node return karta hai, jo sorted linked list ka naya head hota hai.
        Yeh method sabse pehle dekhta hai ki head null hai ya phir linked list mein sirf ek hi node hai ya nahi. Agar hai toh yeh head ko hi return karta hai kyunki ek node ki list ko sort karne ki zaroorat nahi hai.
        Agla kaam ek dummy node create karna hai, jo linked list ka head ke liye assign kiya jaata hai. Yeh dummy node humein nodes ko sorted list mein add karne ke liye reference point ke roop mein use kiya jaayega. 
        Do aur Node objects prev aur current bhi create kiye jaate hain aur unhe dummy node aur head mein assign kiya jaata hai, saath hi prev ko bhi dummy node ke equal set kiya jaata hai.
        Phir ek while loop linked list par iterate karne ke liye use kiya jaata hai. It checks if current node ke paas next node hai ya nahi aur agar hai toh current node ke data se next node ka data bada hai ya nahi. 
        Agar yeh condition sahi hai toh algorithm ek insertion operation perform karta hai. 
        Pehle toh sorted portion of the list mein prev node se shuru karke sahi position dhundha jaata hai current.next node ko add karne ke liye. 
        Jab sahi position mil jaati hai toh algorithm nodes ko rearrange karta hai temp variable se, jo prev.next node ke baad wale node ko hold karta hai. 
        Phir yeh prev.next node ko current.next ke equal set karta hai, current.next ko current.next.next ke equal set karta hai aur prev.next.next ko temp ke equal set karta hai. 
        Aakhri mein, prev dummy node pe reset kiya jaata hai taaki agla node ke liye correct position dhunda jaa sake.
        Agar while loop ki condition sahi nahi hai toh algorithm current node ko current.next pe set karke linked list mein agle node pe move karta hai.
        Jab while loop khatam ho jaata hai, tab algorithm dummy node ka next node return karta hai, jo sorted linked list ka naya head hota hai.
    */
    public void insertionSort() {
        head = insertionSort(head);
    }
    private Node insertionSort(Node head) {
        if (head == null || head.next == null) { //Checks if head is null or has only one value
            return head;
        }
        Node dummy = new Node(0); 
        dummy.next = head;//This dummy node will contain the head of the node.
        Node prev = dummy;
        Node current = head;
        while (current != null) {
            if (current.next != null && current.data > current.next.data) {
                while (prev.next != null && prev.next.data < current.next.data) {
                    prev = prev.next;
                }
                Node temp = prev.next;
                prev.next = current.next;
                current.next = current.next.next;
                prev.next.next = temp;
                prev = dummy;
            } else {
                current = current.next;
            }
        }
        return dummy.next;
    }
    
    // Reverse Linked List
    /*
     * 
     */
    public void reverseList() {
        if(head == null) {
            return;
        }
            Node prev = null;
            Node current = head;
            Node next = null;
    
            while (current != null) {
                next = current.next;
                current.next = prev;
                prev = current;
                current = next;
            }
            head = prev;
    }

    // Find Size
    public int size() {
        int count = 0;
        Node current = head;

        while (current != null) {
            count++;
            current = current.next;
        }
        return count;
    }

    // Printing List
    public void printList() {
        Node current = this.head;
        while (current != null) {
            System.out.print(current.data + "->");
            current = current.next;
        }
        System.out.println();
    }

    public static void main(String[] args) {
        LinkedList list = new LinkedList();
        System.out.println("How many items you want to insert: ");
        int x = sc.nextInt();
        for (int i = 0; i < x; i++) {
            int data = sc.nextInt();
            list.addNode(data);
        }
        System.out.println("Initial List");
        list.printList();
  
        //Insert at position
        System.out.println("Enter Position at which you want to insert:");
        int pos = sc.nextInt();
        System.out.println("Enter Item: ");
        int data = sc.nextInt();
        list.insertAtPosition(pos, data);
        System.out.println("List Printing after inserting "+data+" at "+pos+":");
        list.printList();

        //Deleting an Item
        System.out.println("Enter the item to be deleted: ");
        data = sc.nextInt();
        list.deleteItem(data);
        System.out.println("List Printing After Deleting "+data+":");
        list.printList();

        //Deleting an Item at specific position
        System.out.println("Enter the position to be deleted: ");
        pos = sc.nextInt();
        list.deleteAtPosition(pos);
        System.out.println("List Printing After Deletiing from "+pos+":");
        list.printList();

        //Printing Center of Linked List
        System.out.print("Center of Linked List : ");
        Node center = list.center();
        if(center != null){
            System.out.println(center.data);
        }else{
            System.out.println("List is empty");
        }

        //Print Sorted List
        list.insertionSort();
        System.out.print("Sorted list: ");
        list.printList();

        //Print Reversed List
        list.reverseList();
        System.out.print("Reversed List: ");
        list.printList();

        //Printing Size of List
        System.out.println("Size of the list: " + list.size());
    }
}